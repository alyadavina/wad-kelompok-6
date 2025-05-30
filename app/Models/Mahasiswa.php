<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{

    protected $fillable = [
        'nim', 'nama', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function favoriteBeasiswas()
{
    return $this->hasMany(BeasiswaFavorite::class);
}

    public function notifikasis()
{
    return $this->hasMany(Notifikasi::class);
}
}

