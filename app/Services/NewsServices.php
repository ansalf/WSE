<?php

namespace App\Services;

use App\Constant\DBTypes;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsServices extends News
{
    public function getQuery()
    {
        return $this->newQuery()->with([
            'createdBy' => function ($query) {
                $query->select('id', 'name');
            },
            'category' => function ($query) {
                $query->select('id', 'name');
            },
            'stats' => function ($query) {
                $query->select('id', 'name');
            },
            'thumbnail' => function ($query) {
                $query->addSelect(DB::raw("*, CONCAT('" . url('storage') . "/', directories, '/', filename) as url"))
                    ->whereHas('transtype', function ($query) {
                        $query->where('code', DBTypes::FileNewsThumb);
                    });
            },
        ]);
    }
}
