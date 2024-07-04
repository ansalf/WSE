<?php

namespace App\Http\Controllers;

use App\Constant\DBTypes;
use App\Constant\Systems;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    protected $user, $type;

    public function __construct(User $user, Type $type)
    {
        $this->user = $user;
        $this->type = $type;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->user->query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                        <btn onclick="editForm(`' . route('users.update', $row->id) . '`)" class="btn btn-warning btn-sm"><i class="fa fa-pen"></i></btn>
                        <btn onclick="deleteData(`' . route('users.destroy', $row->id) . '`)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></btn>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $roles = $this->type->where('master_id', $this->type->getIdByCode(DBTypes::UserRole))->get();
        return view('Admin.Pages.Masters.Users.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required'
        ]);

        if ($validator->fails())
            return $this->failed($validator->errors()->first());
        // End Validator

        if ($request->password != $request->confirm_password)
            return $this->failed('Invalid confirmation password', null, 403);

        $create = collect($request->only($this->user->getFillable()))
            ->filter()
            ->put('password', Hash::make($request->password))
            ->put('created_by', $request->session()->get('id'))
            ->toArray();


        $data = $this->user->create($create);
        return $this->success('Success Create New User', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->user->with(['role'])->find($id);
        if (!$data)
            return $this->notFound();
        return $this->success('Success Show User', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->user->find($id);
        if (!$data)
            return $this->notFound();

        // Validator
        $validator = Validator::make($request->all(), [
            'email' => 'email',
        ]);

        if ($validator->fails())
            return $validator->errors();
        // End Validator

        $update = collect($request->only($this->user->getFillable()))
            ->filter()
            ->put('updated_by', $request->session()->get('id'));

        if ($request->has('password'))
            $update
                ->put('password', Hash::make('password'));

        $data->update($update->toArray());
        return $this->success('Success Update User', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->user->find($id);
        if (!$data)
            return $this->notFound();
        $data->delete();
        return $this->success('Berhasil menghapus pengguna', $data);
    }
}
