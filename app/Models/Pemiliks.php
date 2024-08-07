<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemiliks extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'email'
    ];

    public function kosans()
    {
        return $this->hasMany(Kosans::class);
    }
}
