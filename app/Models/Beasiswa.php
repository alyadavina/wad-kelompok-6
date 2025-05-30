<?php

namespace App\Models;

use App\Http\Controllers\FavoriteController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class Beasiswa extends Model
{
    use HasFactory;
    protected $table = 'beasiswas';
    protected $fillable = [
        'nama_beasiswa',
        'deskripsi',
        'kategori',
        'penyelenggara',
        'jenjang_pendidikan',
        'tanggal_buka',
        'tanggal_tutup',
        'link_pendaftaran'
    ];

    public function favoriteBeasiswas()
    {
    return $this->belongsToMany(Beasiswa::class, 'favorites', 'mahasiswa_id', 'beasiswa_id')->withTimestamps();
    }
}
