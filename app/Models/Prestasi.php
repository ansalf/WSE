<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'prestasis';
    protected $fillable = [
        'demis',
        'title',
        'desc',
        'tahun'
    ];
}
