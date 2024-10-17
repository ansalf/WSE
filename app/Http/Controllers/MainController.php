<?php

namespace App\Http\Controllers;

use App\Constant\DBTypes;
use App\Constant\Systems;
use App\Models\Demisioner;
use App\Models\File;
use App\Models\News;
use App\Models\Menu;
use App\Models\Permission;
use App\Models\Type;
use App\Models\User;
use App\Services\DemisionerServices;
use App\Services\NewsServices;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    protected $menu, $permission, $news, $type, $demisioner;
    public function __construct(Menu $menu, Permission $permission, NewsServices $news, Type $type, DemisionerServices $demisioner)
    {
        $this->type = $type;
        $this->news = $news;
        $this->demisioner = $demisioner;
        $this->permission = $permission;
        $this->menu = $menu;
    }

    public function utama()
    {
        $news = $this->news->getQuery()->where('status', $this->type->getIdByCode(DBTypes::NewsPublished))->get();
        return view('index', compact('news'));
    }

    public function it()
    {
        return view('main.it');
    }

    public function projas()
    {
        return view('main.projas');
    }

    public function pc()
    {
        return view('main.pc');
    }

    public function robotik()
    {
        return view('main.robotik');
    }

    public function struktur()
    {
        return view('main.struktur');
    }

    public function demisioner()
    {
        $demis = $this->demisioner->getQuery()->get();
        return view('main.demisioners', compact('demis'));
    }

    public function dashboard()
    {
        $this->setMenuSession();
        $users = User::count();
        $demis = Demisioner::count();
        $news = News::count();

        $files = File::all();
        $storage = 0;
        foreach ($files as $key => $value) {
            $storage += $value->filesize;
        }
        $storage = formatBytes($storage);

        return view('Admin.Pages.dashboard', compact('users', 'demis', 'news', 'storage'));
    }
}
