<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;

class Blade
{
    public static function activeMenu($uri = '') {
        $active = '';
        if (Request::is(Request::segment(1) . '/' . $uri . '/*') || Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri)) {
            $active = 'active';
        }
        return $active;
    }
}
