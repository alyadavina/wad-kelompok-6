<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notifikasi;

class NotifikasiSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswaIds = [1, 2, 3];

        foreach ($mahasiswaIds as $id) {
            Notifikasi::create([
                'judul' => 'Beasiswa Telkom Dibuka!',
                'isi' => 'Segera daftar beasiswa Telkom sebelum 30 Juni.',
                'mahasiswa_id' => $id,
                'is_read' => 0
            ]);

            Notifikasi::create([
                'judul' => 'Beasiswa Bank Indonesia',
                'isi' => 'Telah hadir pendaftaran beasiswa Bank Indonesia dibuka hingga 15 Juli 2025.',
                'mahasiswa_id' => $id,
                'is_read' => 0
            ]);
        }
    }
}

