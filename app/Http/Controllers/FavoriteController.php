<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeasiswaFavorite;
use App\Models\Mahasiswa;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $mahasiswaId = auth()->id();
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
        $mahasiswa = Mahasiswa::with('favoriteBeasiswas.beasiswa')->find(auth()->id());
        return view('favorite', compact('mahasiswa'));
    }
}
