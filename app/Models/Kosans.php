<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kosans extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemilik_id',
        'nama',
        'alamat',
        'gender',
        'fasilitas',
        'jmlh_kamar',
        'status',
        'harga',
        'deskripsi',
        'image',
        'latitude',
        'longitude'
    ];

    public function pemilik()
    {
        return $this->belongsTo(Pemiliks::class, 'pemilik_id');
    }

    public function gallerys()
    {
        return $this->hasMany(Gallerys::class, 'kosan_id');
    }
}
