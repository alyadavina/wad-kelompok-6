<?php

namespace App\Models;
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
        'persyaratan',
        'jenjang_pendidikan',
        'tanggal_buka',
        'tanggal_tutup',
        'link_pendaftaran',
        'gambar'
    ];

    public function mahasiswaFavorit()
    {
        return $this->belongsToMany(Mahasiswa::class, 'beasiswa_favorit')->withTimestamps();
    }

    public function comments()
    {
    return $this->hasMany(Comment::class);
    }

}
