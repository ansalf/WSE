<?php

namespace App\Http\Controllers;

use App\Constant\DBTypes;
use App\Constant\Routes;
use App\Models\Menu;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\HtmlString;
use Yajra\DataTables\Facades\DataTables;

class TypeController extends Controller
{
    protected $user, $type, $menu;

    public function __construct(User $user, Type $type, Menu $menu)
    {
        $this->user = $user;
        $this->type = $type;
        $this->menu = $menu;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->type->where('master_id', null)->with('children')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('children', function ($row) {
                    $list = '<ol>';
                    foreach ($row->children as $key => $value) {
                        $value->desc ? $list .= '<li>
                        <p>' . $value->name . '</p>
                    </li>' : $list .= '<li><div class="d-flex justify-content-between w-100">
                    <p>' . $value->name . '</p>
                    <div>
                        <button class="btn btn-warning btn-sm" onclick="editForm(`' . route('types.update', $value->id) . '`)"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="deleteData(`' . route('types.destroy', $value->id) . '`)"><i class="fa fa-trash"></i></button>
                    </div>
                </div></li>';   
                    }
                    $list .= '</ol>';
                    return new HtmlString($list);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $features = $this->setFeatureSession(Routes::routeSettingTypes);
        $parent = $this->type->where('master_id', null)->get();

        return view('Admin.Pages.Settings.Types.index', compact('features', 'parent'));
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
            'name' => 'required'
        ]);

        if ($validator->fails())
            return $this->failed($validator->errors()->first());
        // End Validator

        $create = collect($request->only($this->type->getFillable()))
            ->filter()
            ->toArray();

        $data = $this->type->create($create);
        return $this->success('Success Create New Type', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = $this->type->with(['parent'])->find($id);
        if (!$data)
            return $this->notFound();
        return $this->success('Success Show Type', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $data = $this->type->find($id);
        if (!$data)
            return $this->notFound();

        $update = collect($request->only($this->type->getFillable()))
            ->filter();

        $data->update($update->toArray());
        return $this->success('Success Update Type', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = $this->type->find($id);
        if (!$data)
            return $this->notFound();
        $data->delete();
        return $this->success('Berhasil menghapus Type', $data);
    }
}
