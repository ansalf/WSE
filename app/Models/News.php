<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = [
        'judul',
        'isi_berita',
        'status',
        'kategori',

        'created_by',
        'updated_by',
        'activations'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function category()
    {
        return $this->belongsTo(Type::class, 'kategori');
    }

    public function stats()
    {
        return $this->belongsTo(Type::class, 'status');
    }

    public function thumbnail()
    {
        return $this->hasOne(File::class, 'refid');
    }
}
