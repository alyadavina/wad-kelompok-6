<?php

namespace App\Models;

<<<<<<< HEAD
=======

>>>>>>> origin/Davy_brench
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
<<<<<<< HEAD
    //
=======
    protected $table = 'notifikasi';
    protected $fillable = ['mahasiswa_id', 'judul', 'isi', 'is_read'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

>>>>>>> origin/Davy_brench
}
