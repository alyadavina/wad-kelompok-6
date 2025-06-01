<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdmintelbeaSeeder extends Seeder
{
    public function run(): void
    {
        Admintelbea::create([
            'nama' => 'David Beckham',
            'email' => 'admintelbea777@gmail.com',
            'password' => Hash::make('persib1933'),
        ]);
    }
}
