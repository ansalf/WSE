<?php

namespace App\Services;

use App\Constant\DBTypes;
use App\Models\Demisioner;
use Illuminate\Support\Facades\DB;

class DemisionerServices extends Demisioner
{
    public function getQuery()
    {
        return $this->newQuery()->with([
            'jk' => function ($query) {
                $query->select('id', 'name');
            },
            'prestasi',
            'jabatan' => function ($query) {
                $query->with('jabatan');
            },
            'photo' => function ($query) {
                $query->addSelect(DB::raw("*, CONCAT('" . url('storage') . "/', directories, '/', filename) as url"))
                    ->whereHas('transtype', function ($query) {
                        $query->where('code', DBTypes::FileDemisPic);
                    });
            },
        ]);
    }
}
