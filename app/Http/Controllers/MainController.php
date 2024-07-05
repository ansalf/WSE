<?php

namespace App\Http\Controllers;

use App\Constant\Systems;
use App\Models\Menu;
use App\Models\Permission;
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

        return view('Admin.Pages.dashboard');
    }
}
