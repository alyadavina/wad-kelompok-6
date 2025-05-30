<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = Beasiswa::all();
        return view('beasiswa.index', compact('data'));
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
        $beasiswas = Beasiswa::all();
        return view('beasiswa.index', compact('beasiswas'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('beasiswa.show', compact('beasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
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

    return redirect()->route('beasiswa.index')->with('success', 'Beasiswa berhasil diperbarui!');
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