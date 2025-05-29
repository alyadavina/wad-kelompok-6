<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;
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

    public function favoritBeasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'beasiswa_favorit');
    }
}
