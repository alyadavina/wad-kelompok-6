<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeasiswaFavorite;
use App\Models\Mahasiswa;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $mahasiswaId = auth()->guard('mahasiswa')->id();
        $existing = BeasiswaFavorite::where('mahasiswa_id', $mahasiswaId)
            ->where('beasiswa_id', $request->beasiswa_id)
            ->first();

        if (!$existing) {
            BeasiswaFavorite::create([
                'mahasiswa_id' => $mahasiswaId,
                'beasiswa_id' => $request->beasiswa_id,
                'tanggal_difavoritkan' => now()
            ]);
        }

        return redirect()->route('favorit.index')->with('success', 'Beasiswa ditambahkan ke favorit!');
    }

    public function index()
    {
        $mahasiswa = Mahasiswa::with('favoriteBeasiswas.beasiswa')->find(auth()->guard('mahasiswa')->id());
        return view('favorite', compact('mahasiswa'));
    }

    public function destroy($id)
    {
        $mahasiswaId = auth()->guard('mahasiswa')->id();
        BeasiswaFavorite::where('mahasiswa_id', $mahasiswaId)
            ->where('beasiswa_id', $id)
            ->delete();

        return redirect()->route('favorit.index')->with('success', 'Beasiswa dihapus dari favorit.');
    }

    public function update(Request $request, $id)
    {
        $mahasiswaId = auth()->guard('mahasiswa')->id();
        $favorit = BeasiswaFavorite::where('mahasiswa_id', $mahasiswaId)
            ->where('beasiswa_id', $id)
            ->firstOrFail();

        $favorit->update([
            'tanggal_difavoritkan' => now()
        ]);

        return redirect()->route('favorit.index')->with('success', 'Data favorit diperbarui.');
    }
}
