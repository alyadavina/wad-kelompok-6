<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Beasiswa;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beasiswas = Beasiswa::all();
        return view('beasiswa.index', compact('beasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
        'nama_beasiswa' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'kategori' => 'required|in:Tel-U,Nasional',
        'penyelenggara' => 'required|string|max:255',
        'jenjang_pendidikan' => 'required|string|max:20',
        'tanggal_buka' => 'required|date',
        'tanggal_tutup' => 'required|date|after_or_equal:tanggal_buka',
        'link_pendaftaran' => 'required|url',
    ]);

    \App\Models\Beasiswa::create($validated);

    return redirect()->route('beasiswa.index')->with('success', 'Beasiswa berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        return view('beasiswa.show', compact('beasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        return view('beasiswa.edit', compact('beasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->update($request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'jumlah_pendaftar' => 'required|integer',
            'deadline' => 'required|date',
        ]));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->delete();
        return redirect()->route('beasiswa.index')->with('success', 'Beasiswa berhasil dihapus!');

    }

}
