<?php

use App\Services\TypeService;


function findType(String $code)
{
    $service = new TypeService();
    return $service->getIdWithCode($code);
}