<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'jabatans';

    protected $fillable = [
        'demis',
        'jabatan',
        'tahun'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Type::class, 'jabatan');
    }
}
