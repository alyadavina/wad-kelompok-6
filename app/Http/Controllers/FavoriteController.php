<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeasiswaFavorite;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $mahasiswaId = Auth::guard('mahasiswa')->id();
        $existing = BeasiswaFavorite::where('mahasiswa_id', $mahasiswaId)
            ->where('beasiswa_id', $request->beasiswa_id)
            ->first();

        if (!$existing) {
            BeasiswaFavorite::create([
                'mahasiswa_id' => $mahasiswaId,
                'beasiswa_id' => $request->beasiswa_id,
            ]);
        }

        return redirect()->route('favorit.index')->with('success', 'Beasiswa ditambahkan ke favorit!');
    }

    public function index()
    {
        $mahasiswaId = Auth::guard('mahasiswa')->id();
        $mahasiswa = Mahasiswa::with('favoriteBeasiswas.beasiswa')->find($mahasiswaId);

        return view('favorite', compact('mahasiswa'));
    }
}
