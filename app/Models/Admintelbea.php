<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admintelbea extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama', 'email', 'password',
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
