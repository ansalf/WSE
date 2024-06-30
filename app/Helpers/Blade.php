<?php

function activeMenu($uri = '') {
    $active = '';
    if (str_contains(url()->current(), $uri)) {
        $active = 'active';
    }
    return $active;
}
