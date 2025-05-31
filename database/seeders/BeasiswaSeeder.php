<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Beasiswa;

class BeasiswaSeeder extends Seeder
{
    public function run()
    {
        Beasiswa::create([
            'nama_beasiswa' => 'Beasiswa Bank Indonesia',
            'deskripsi' => 'Beasiswa untuk mahasiswa aktif berprestasi.',
            'kategori' => 'Nasional',
            'penyelenggara' => 'Bank Indonesia',
            'jenjang_pendidikan' => 'S1',
            'tanggal_buka' => '2025-05-01',
            'tanggal_tutup' => '2025-06-15',
            'link_pendaftaran' => 'https://bicara131.bi.go.id/knowledgebase/article/KA-01149/en-us',
        ]);

        Beasiswa::create([
            'nama_beasiswa' => 'Beasiswa Telkom University',
            'deskripsi' => 'Khusus untuk mahasiswa Tel-U.',
            'kategori' => 'Tel-U',
            'penyelenggara' => 'Telkom University',
            'jenjang_pendidikan' => 'S1',
            'tanggal_buka' => '2025-06-01',
            'tanggal_tutup' => '2025-07-15',
            'link_pendaftaran' => 'https://docs.google.com/forms/d/e/1FAIpQLSdTZg0_-hK3kc20S1EJ-ssb2-OyOCY1K8mOdTwbXudZ0_j_xw/viewform',
        ]);

        Beasiswa::create([
            'nama_beasiswa' => 'Beasiswa Kemenag Indonesia Bangkit',
            'deskripsi' => 'Beasiswa terbuka untuk mahasiswa-mahasiswa seluruh indonesia yang memiliki bakat dibidang keagamaan.',
            'kategori' => 'Tel-U',
            'penyelenggara' => 'Kementrian Agama Republik Indonesia',
            'jenjang_pendidikan' => 'S1',
            'tanggal_buka' => '2025-02-05',
            'tanggal_tutup' => '2025-11-08',
            'link_pendaftaran' => 'https://beasiswa.kemenag.go.id/',
            'gambar' => 'beasiswa_kemenag.jpg',
        ]);
        Beasiswa::create([
            'nama_beasiswa' => 'Beasiswa Bidikmisi',
            'deskripsi' => 'Beasiswa untuk mahasiswa kurang mampu secara ekonomi.',
            'kategori' => 'Nasional',
            'penyelenggara' => 'Kementerian Pendidikan dan Kebudayaan',
            'jenjang_pendidikan' => 'S1',
            'tanggal_buka' => '2025-03-01',
            'tanggal_tutup' => '2025-04-30',
            'link_pendaftaran' => 'https://bidikmisi.kemdikbud.go.id/',
        ]);
    
        Beasiswa::create([
            'nama_beasiswa' => 'Beasiswa Djitu',
            'deskripsi' => 'Beasiswa DJITU adalah program pendidikan dari Yayasan Khouw Kalbe yang bertujuan menciptakan generasi perempuan yang mandiri berkarakter DJITU (Disiplin, Jujur, Inovatif, Tanggungjawab, Unggul) agar dapat mengembangkan dan melakukan perubahan positif di daerah asalnya.',
            'kategori' => 'Nasional',
            'penyelenggara' => 'Yayasan Khouw Kalbe',
            'jenjang_pendidikan' => 'S1',
            'tanggal_buka' => '2025-06-06',
            'tanggal_tutup' => '2025-11-10',
            'link_pendaftaran' => 'https://www.yayasankhouwkalbe.org/djitu-reguler/djitu-2025',
        ]);

    }
}
