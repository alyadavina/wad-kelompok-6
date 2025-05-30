<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\BeasiswaFavorite;
use App\Models\Mahasiswa;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $mahasiswaId = Auth::id();
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

    public function destroy(Request $request)
    {
        $mahasiswaId = Auth::id();
        BeasiswaFavorite::where('mahasiswa_id', $mahasiswaId)
        ->where('beasiswa_id', $request->beasiswa_id)
        ->delete();

    return redirect()->route('favorit.index')->with('success', 'Beasiswa dihapus dari favorit!');
}

    public function update(Request $request)
{
        $mahasiswaId = Auth::id();
        $favorite = BeasiswaFavorite::where('mahasiswa_id', $mahasiswaId)
            ->where('beasiswa_id', $request->beasiswa_id)
            ->first();

    if ($favorite) {
        $newStatus = $favorite->status === 'favorite' ? 'not_favorite' : 'favorite';
        $favorite->update(['status' => $newStatus]);

        return redirect()->route('favorit.index')->with('success', 'Status favorit diperbarui!');
    }

    return redirect()->route('favorit.index')->with('error', 'Beasiswa tidak ditemukan di daftar favorit.');
}

}
