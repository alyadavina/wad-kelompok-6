<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
<<<<<<< HEAD
=======
use Illuminate\Notifications\Notifiable;
>>>>>>> origin/Davy_brench

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
<<<<<<< HEAD
=======

    public function notifikasis()
{
    return $this->hasMany(Notifikasi::class);
}
>>>>>>> origin/Davy_brench
}

