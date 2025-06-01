<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beasiswa;
use Illuminate\Http\Request;

class BeasiswaAdminController extends Controller
{
    public function index()
    {
        $beasiswas = Beasiswa::all();
        return view('Admin.admin_beasiswa', compact('beasiswas'));
    }

    public function store(Request $request)
    {
        Beasiswa::create([
            'nama_beasiswa'       => $request->nama_beasiswa,
            'deskripsi'           => $request->deskripsi,
            'kategori'            => $request->kategori,
            'penyelenggara'       => $request->penyelenggara,
            'jenjang_pendidikan'  => $request->jenjang_pendidikan,
            'tanggal_buka'        => $request->tanggal_buka,
            'tanggal_tutup'       => $request->tanggal_tutup,
            'link_pendaftaran'    => $request->link_pendaftaran,
        ]);
        return redirect()->route('admin.beasiswa.index');
    }

    public function update(Request $request, $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->update($request->all());
        return redirect()->route('admin.beasiswa.index');
    }

    public function destroy($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->delete();
        return redirect()->route('admin.beasiswa.index');
    }
}
