<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'types';

    protected $fillable = [
        'code',
        'name',
        'seq',
        'desc',
        'master_id',
        'created_by',
        'updated_by',
        'activations'
    ];

    public function getIdByCode(string $code)
    {
        return $this->where('code', $code)->first()->id;
    }

    public function children() {
        return $this->hasMany(Type::class, 'master_id');
    }

    public function parent() {
        return $this->belongsTo(Type::class, 'master_id');
    }
}
