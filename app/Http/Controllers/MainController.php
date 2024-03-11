<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
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
}
