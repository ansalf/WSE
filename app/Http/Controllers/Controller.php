<?php

namespace App\Http\Controllers;

use App\Constant\Routes;
use App\Constant\Systems;
use App\Models\File;
use App\Models\Menu;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function success($message = 'Success', $data = null, $code = 200)
    {
        if ($data == null)
            return response()->json(['message' => $message], $code);
        else
            return response()->json(['message' => $message, 'data' => $data], $code);
    }

    public function failed($message = 'Failed', $data = null, $code = 400)
    {
        if ($data == null)
            return response()->json(['message' => $message], $code);
        else
            return response()->json(['message' => $message, 'data' => $data], $code);
    }

    public function notFound($message = 'Data Not Found!')
    {
        return response()->json(['message' => $message], 404);
    }

    public function setMenuSession()
    {
        $menu = new Menu();
        $menus = $menu->where('masterid', null)->with([
            'features' => function ($query) {
                $query->where('featslug', 'view')->whereHas('permissions', function ($query) {
                    $query->where('role', Auth::user()->role);
                });
            },
            'children' =>
            function ($query) {
                $query->with(['features' => function ($query) {
                    $query->where('featslug', 'view')->whereHas(
                        'permissions',
                        function ($query) {
                            $query->where('role', Auth::user()->role);
                        }
                    );
                }]);
            },
        ])->get();

        session()->put(Systems::sessionMenus, $menus);
    }

    public function setFeatureSession(string $route)
    {
        $menu = new Menu();
        return $menu->where('menuroute', $route)
            ->with(['features' => function ($query) {
                $query->whereNot('featslug', 'view')->with(['permissions'])->whereHas('permissions', function ($query) {
                    $query->where('role', Auth::user()->role);
                });
            }])->first();
    }

    public function uploadFile($file, $type, $refid, $filename, $directory, $creatorid = null)
    {
        $filesService = new File();
        if ($creatorid) {

            $oldFile = $filesService->where('refid', $refid)->where('transtypeid', $type)->first();
            unlink(storage_path("app/public/$directory/" . $oldFile->filename));
            $oldFile->delete();

            $result = $file->storeAs('public/'.$directory, $filename);
            if ($result) {
                $data = [];

                $data['transtypeid'] = $type;
                $data['refid'] = $refid;
                $data['directories'] = $directory;
                $data['filename'] = $filename;
                $data['mimetype'] = $file->getMimeType();
                $data['filesize'] = $file->getSize();
                $data['created_by'] = $creatorid;
                $data['updated_by'] = auth()->user()->id;
                $filesService->create($data);
            }
        } else {
            $result = $file->storeAs('public/'.$directory, $filename);
            if ($result) {
                $data = [];
                
                $data['transtypeid'] = $type;
                $data['refid'] = $refid;
                $data['directories'] = $directory;
                $data['filename'] = $filename;
                $data['mimetype'] = $file->getMimeType();
                $data['filesize'] = $file->getSize();
                $data['created_by'] = auth()->user()->id;
                $filesService->create($data);
            }
        }
    }
}
