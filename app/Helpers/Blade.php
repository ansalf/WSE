<?php

use Illuminate\Support\Str;

function activeMenu($uri = '')
{
    $uri = Str::lower($uri);
    $active = '';
    if (str_contains(url()->current(), $uri)) {
        $active = 'active';
    }
    return $active;
}
