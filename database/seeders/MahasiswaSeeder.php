<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::first();

        Mahasiswa::insert([
            [
                'nama' => 'Kylian Mbappe',
                'email' => 'Kylianmbappe@gmail.com',
                'password' => Hash::make('jusalpukat'),
                'nim' => '102022300132',
                'jurusan' => 'Teknik Industri',
                'fakultas' => 'Fakultas Rekayasa Industri',
                'angkatan' => '2022',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               
                'nama' => 'Jude Bellingham',
                'email' => 'judebellingham@gmail.com',
                'password' => Hash::make('oporayam'),
                'nim' => '102022300133',
                'jurusan' => 'Sistem Informasi',
                'fakultas' => 'Fakultas Rekayasa Industri',
                'angkatan' => '2022',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'nama' => 'Vinicius Junior',
                'email' => 'viniciusjunior@gmail.com',
                'password' => Hash::make('nasigoreng'),
                'nim' => '102022300134',
                'jurusan' => 'Teknik Telekomunikasi',
                'fakultas' => 'Fakultas Teknik Elektro',
                'angkatan' => '2021',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}