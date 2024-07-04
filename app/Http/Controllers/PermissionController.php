<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    protected $permission, $menu;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Permission $permission, Menu $menu)
    {
        $this->permission = $permission;
        $this->menu = $menu;
    }

    public function deletePermission(Request $request)
    {
        $data = $this->permission->where('role', $request->role)->where('permisfeatid', $request->permisfeatid)->delete();
        return $this->success('Success Delete Permission', $data);
    }

    public function getPermission(Request $request)
    {
        $data = $this->permission->where('role', $request->role)->get();
        return $this->success('Success Show Permission', $data);
    }

    public function getMyPermission()
    {
        $data = $this->permission->where('role', Auth::user()->role)->with(['feature'=>function ($query) {
            $query->with(['menu']);
        }])->get();
        return $this->success('Success Show Permission', $data);
    }

    public function index()
    {
        $data = $this->permission->all();
        return $this->success('Success Show All Permission', $data);
    }

    public function store(Request $request)
    {
        // Validator
        $validator = Validator::make($request->all(), [
            'permisfeatid' => 'required|int'
        ]);

        if ($validator->fails())
            return $this->failed($validator->errors()->first());
        // End 

        $create = collect($request->only($this->permission->getFillable()))
            ->filter()
            ->put('created_by', Auth::user()->id)
            ->toArray();

        $data = $this->permission->create($create);

        return $this->success('Success Create New Permission', $data);
    }

    public function show($id)
    {
        $data = $this->permission->find($id);
        if (!$data)
            return $this->notFound();
        return $this->success('Success Show Permission', $data);
    }

    public function update($id, Request $request)
    {
        $data = $this->permission->find($id);
        if (!$data)
            return $this->notFound();

        $update = collect($request->only($this->permission->getFillable()))
            ->filter()
            ->put('updated_by', $request->session()->get('id'));

        $data->update($update->toArray());
        return $this->success('Success Update Permission', $data);
    }

    public function destroy($id)
    {
        $data = $this->permission->find($id);
        if (!$data)
            return $this->notFound();
        $data->delete();
        return $this->success('Success Delete Permission', $data);
    }
}
