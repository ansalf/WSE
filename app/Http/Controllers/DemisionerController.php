<?php

namespace App\Http\Controllers;

use App\Constant\DBTypes;
use App\Constant\FileDirectory;
use App\Constant\Routes;
use App\Models\Demisioner;
use App\Models\File;
use App\Models\Jabatan;
use App\Models\Menu;
use App\Models\Prestasi;
use App\Models\Type;
use App\Services\DemisionerServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class DemisionerController extends Controller
{
    protected $demisioner, $type, $menu, $file, $prestasi, $jabatan;

    public function __construct(DemisionerServices $demisioner, Type $type, Menu $menu, File $file, Prestasi $prestasi, Jabatan $jabatan)
    {
        $this->demisioner = $demisioner;
        $this->type = $type;
        $this->menu = $menu;
        $this->file = $file;
        $this->prestasi = $prestasi;
        $this->jabatan = $jabatan;
    }

    public function look(string $id, Request $request)
    {
        $data = $this->demisioner->getQuery()->find(decrypt($id));
        return view('main.dt_demis', compact('data'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Demisioner::with(['jk'])->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('genders', function ($row) {
                    return $row->jk->name ?? '';
                })
                ->addColumn('action', function ($row) {
                    $btn = '
                        <btn onclick="editForm(`' . route('demisioners.update', $row->id) . '`)" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></btn>
                        <btn onclick="deleteData(`' . route('demisioners.destroy', $row->id) . '`)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></btn>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $features = $this->setFeatureSession(Routes::routeMasterDemisioner);
        $roles = $this->type->whereNot('code', DBTypes::RoleSuperAdmin)->where('master_id', $this->type->getIdByCode(DBTypes::UserRole))->get();
        $genders = $this->type->where('master_id', $this->type->getIdByCode(DBTypes::UserGender))->get();

        return view('Admin.Pages.Masters.Demisioners.index', compact('features', 'roles', 'genders'));
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
            'nama' => 'required',
            'periode' => 'required'
        ]);

        if ($validator->fails())
            return $this->failed($validator->errors()->first());
        // End Validator

        $create = collect($request->only($this->demisioner->getFillable()))
            ->filter()
            ->put('created_by', $request->session()->get('id'))
            ->toArray();

        $data = $this->demisioner->create($create);

        $photo = $request->file('photo');
        if ($photo) {
            $type = $this->type->getIdByCode(DBTypes::FileDemisPic);
            $no = 0;
            foreach ($photo as $key) {
                $no++;
                $name = Str::random(15) . '-' .  $no . '-' . $key->getClientOriginalName();
                $this->uploadFile($key, $type, $data->id, $name, FileDirectory::DemisionerPhotos);
            }
        }

        // Simpan data jabatan
        foreach ($request->jabatan as $index => $jabatanId) {
            $this->jabatan->create([
                'demis' => $data->id,
                'jabatan' => $jabatanId,
                'tahun' => $request->tahun[$index],
            ]);
        }

        // Simpan data prestasi
        foreach ($request->title as $index => $title) {
            $this->prestasi->create([
                'demis' => $data->id,
                'title' => $title,
                'desc' => $request->desc[$index],
                'tahun' => $request->thn[$index],
            ]);
        }

        return $this->success('Success Create New Demisioner', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->demisioner->getQuery()->find($id);
        if (!$data)
            return $this->notFound();

        return $this->success('Success Show Demisioner', $data);
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
        $data = $this->demisioner->find($id);
        if (!$data)
            return $this->notFound();

        $this->destroy($id);

        $create = collect($request->only($this->demisioner->getFillable()))
            ->filter()
            ->put('created_by', $request->session()->get('id'))
            ->put('updated_by', $request->session()->get('id'))
            ->toArray();

        $data = $this->demisioner->create($create);

        $photo = $request->file('photo');
        if ($photo) {
            $type = $this->type->getIdByCode(DBTypes::FileDemisPic);
            $no = 0;
            foreach ($photo as $key) {
                $no++;
                $name = Str::random(15) . '-' .  $no . '-' . $key->getClientOriginalName();
                $this->uploadFile($key, $type, $data->id, $name, FileDirectory::DemisionerPhotos);
            }
        }

        // Simpan data jabatan
        foreach ($request->jabatan as $index => $jabatanId) {
            $this->jabatan->create([
                'demis' => $data->id,
                'jabatan' => $jabatanId,
                'tahun' => $request->tahun[$index],
            ]);
        }

        // Simpan data prestasi
        foreach ($request->title as $index => $title) {
            $this->prestasi->create([
                'demis' => $data->id,
                'title' => $title,
                'desc' => $request->desc[$index],
                'tahun' => $request->thn[$index],
            ]);
        }

        return $this->success('Success Create New Demisioner', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->demisioner->find($id);
        if (!$data)
            return $this->notFound();

        $pictures = $this->file->where('transtypeid', $this->type->getIdByCode(DBTypes::FileDemisPic))->where('refid', $id)->get();
        if ($pictures) {
            foreach ($pictures as $key) {
                unlink(storage_path("app/public/$key->directories/" . $key->filename));
                $key->delete();
            }
        }

        $data->delete();
        return $this->success('Success Delete Demisioner', $data);
    }
}
