<?php

namespace App\Http\Controllers;

use App\Constant\Systems;
use App\Models\Demisioner;
use App\Models\File;
use App\Models\Menu;
use App\Models\News;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    protected $menu, $permission;
    public function __construct(Menu $menu, Permission $permission)
    {
        $this->permission = $permission;
        $this->menu = $menu;
    }

    public function utama()
    {
        return view('index');
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
