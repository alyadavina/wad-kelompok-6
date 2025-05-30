<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = 'notifikasi';
    protected $fillable = ['mahasiswa_id', 'judul', 'isi', 'is_read'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

}
