<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;
use App\Models\Mahasiswa;
use App\Models\FavoriteBeasiswa;

class DashboardController extends Controller
{
    public function index()
    {
    $mahasiswa = Mahasiswa::with('favoriteBeasiswas.beasiswa')->find(auth()->id());
    $beasiswas = Beasiswa::all();

    return view('dashboard', compact('mahasiswa', 'beasiswas'));
    }
    
    
}
