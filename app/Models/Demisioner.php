<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demisioner extends Model
{
    use HasFactory;
    protected $table = 'demisioners';
    protected $fillable = [
        'nama',
        'periode',
        'gender',

        'created_by',
        'updated_by',
        'activations'
    ];

    public function jk()
    {
        return $this->belongsTo(Type::class, 'gender');
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class, 'demis');
    }

    public function jabatan()
    {
        return $this->hasMany(Jabatan::class, 'demis');
    }

    public function photo()
    {
        return $this->hasMany(File::class, 'refid');
    }
}
