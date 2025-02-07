<?php

namespace App\Http\Controllers;

use App\Constant\DBTypes;
use App\Constant\FileDirectory;
use App\Constant\Routes;
use App\Models\File;
use App\Models\Menu;
use App\Models\News;
use App\Models\Type;
use App\Services\NewsServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    protected $news, $type, $menu, $file;

    public function __construct(NewsServices $news, Type $type, Menu $menu, File $file)
    {
        $this->news = $news;
        $this->type = $type;
        $this->menu = $menu;
        $this->file = $file;
    }

    public function look(string $id, Request $request)
    {
        $data = $this->news->getQuery()->find(decrypt($id));
        return view('main.dt_news', compact('data'));
    }

    public function toggle(Request $request)
    {
        $data = $this->news->find($request->id);
        if (!$data)
            return $this->notFound();

        if ($request->status == "upload") {
            $status = $this->type->getIdByCode(DBTypes::NewsPublished);
        } else {
            $status = $this->type->getIdByCode(DBTypes::NewsArchived);
        }

        $update = collect($request->only($this->news->getFillable()))
            ->filter()
            ->put('status', $status)
            ->put('updated_by', Auth::user()->id);

        $data->update($update->toArray());

        return $this->success('Success Update News', $data);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = News::with(['createdBy', 'category', 'stats'])->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('stats', function ($row) {
                    if ($row->status == $this->type->getIdByCode(DBTypes::NewsDraft)) {
                        $badge = '<div class="badge badge-success">' . $row->stats->name . '</div>';
                        return new HtmlString($badge);
                    } else if ($row->status == $this->type->getIdByCode(DBTypes::NewsPublished)) {
                        $badge = '<div class="badge badge-primary">' . $row->stats->name . '</div>';
                        return new HtmlString($badge);
                    } else {
                        $badge = '<div class="badge badge-info">' . $row->stats->name . '</div>';
                        return new HtmlString($badge);
                    }
                })
                ->addColumn('category', function ($row) {
                    return $row->category->name ?? '';
                })
                ->addColumn('penulis', function ($row) {
                    return $row->createdBy->name ?? 'Anonymous';
                })
                ->addColumn('action', function ($row) {
                    $btn = '
                    <btn onclick="editForm(`' . route('news.update', $row->id) . '`)" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></btn>
                    <btn onclick="deleteData(`' . route('news.destroy', $row->id) . '`)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></btn>
                    ';
                    if ($row->status == $this->type->getIdByCode(DBTypes::NewsDraft)) {
                        $btn .= '
                            <btn onclick="toggle(`' . $row->id . '`, `upload`)" class="btn btn-success btn-sm"><i class="fa fa-upload"></i></btn>
                        ';
                    } else if ($row->status == $this->type->getIdByCode(DBTypes::NewsPublished)) {
                        $btn .= '
                            <btn onclick="toggle(`' . $row->id . '`, `archive`)" class="btn btn-primary btn-sm"><i class="fa fa-archive"></i></btn>
                        ';
                    } else if ($row->status == $this->type->getIdByCode(DBTypes::NewsArchived)) {
                        $btn .= '
                            <btn onclick="toggle(`' . $row->id . '`, `upload`)" class="btn btn-info btn-sm"><i class="fa fa-upload"></i></btn>
                        ';
                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $features = $this->setFeatureSession(Routes::routeMasterNews);

        $category = $this->type->where('master_id', $this->type->getIdByCode(DBTypes::NewsCategory))->get();
        return view('Admin.Pages.Masters.News.index', compact('category', 'features'));
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
            'judul' => 'required',
        ]);

        if ($validator->fails())
            return $this->failed($validator->errors()->first());
        // End Validator

        $create = collect($request->only($this->news->getFillable()))
            ->filter()
            ->put('status', $this->type->getIdByCode(DBTypes::NewsDraft))
            ->put('created_by', Auth::user()->id)
            ->toArray();

        $data = $this->news->create($create);

        if ($request->hasFile('thumbnail')) {
            $type = $this->type->getIdByCode(DBTypes::FileNewsThumb);

            $name = Str::random(15) . '-' . $request->file('thumbnail')->getClientOriginalName();
            $this->uploadFile($request->file('thumbnail'), $type, $data->id, $name, FileDirectory::NewsThumbnails);
        }
        return $this->success('Success Create New News', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->news->getQuery()->find($id);
        if (!$data)
            return $this->notFound();
        return $this->success('Success Show News', $data);
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
        $data = $this->news->find($id);
        if (!$data)
            return $this->notFound();

        $update = collect($request->only($this->news->getFillable()))
            ->filter()
            ->put('updated_by', Auth::user()->id);

        $data->update($update->toArray());

        if ($request->hasFile('thumbnail')) {
            $type = $this->type->getIdByCode(DBTypes::FileNewsThumb);

            $name = $request->title . '-' . $request->file('thumbnail')->getClientOriginalName();
            $this->uploadFile($request->file('thumbnail'), $type, $data->id, $name, FileDirectory::NewsThumbnails, $data->created_by);
        }

        return $this->success('Success Update News', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->news->find($id);
        if (!$data)
            return $this->notFound();

        $thumbnail = $this->file->where('transtypeid', $this->type->getIdByCode(DBTypes::FileNewsThumb))->where('refid', $id)->first();
        if ($thumbnail) {
            unlink(storage_path("app/public/$thumbnail->directories/" . $thumbnail->filename));
            $thumbnail->delete();
        }

        $data->delete();
        return $this->success('Success Delete News', $data);
    }
}
