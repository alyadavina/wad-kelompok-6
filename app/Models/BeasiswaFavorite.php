<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeasiswaFavorite extends Model
{
    protected $table = 'beasiswa_favorit';

    protected $fillable = ['mahasiswa_id', 'beasiswa_id'];

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
