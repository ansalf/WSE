<?php

namespace App\Http\Controllers;

use App\Constant\Routes;
use App\Models\File;
use App\Models\Menu;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\HtmlString;
use Yajra\DataTables\Facades\DataTables;

class FileController extends Controller
{
    protected $type, $menu, $file;

    public function __construct(Type $type, Menu $menu, File $file)
    {
        $this->type = $type;
        $this->menu = $menu;
        $this->file = $file;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->file->query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $url = url("storage/$row->directories/$row->filename");
                    $btn = '
                        <btn onclick="viewImg(`' . $url . '`)" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></btn>
                        <btn onclick="deleteData(`' . route('files.destroy', $row->id) . '`)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></btn>
                    ';
                    return $btn;
                })
                ->addColumn('filesize', function ($row) {
                    return formatBytes($row->filesize);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $features = $this->setFeatureSession(Routes::routeSettingFiles);

        return view('Admin.Pages.Settings.Files.index', compact('features'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->file->find($id);
        if (!$data)
            return $this->notFound();

        unlink(storage_path("app/public/$data->directories/" . $data->filename));

        $data->delete();
        return $this->success('Success Delete File', $data);
    }
}
