<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Gallerys extends Model
{
    use HasFactory;

    protected $table = 'gallerys';

    protected $fillable = [
        'kosan_id',
        'judul',
        'foto'
    ];

    public function kosan()
    {
        return $this->belongsTo(Kosans::class, 'kosan_id');
    }
}
