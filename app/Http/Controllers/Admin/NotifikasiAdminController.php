<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notifikasi;

class NotifikasiAdminController extends Controller
{
    public function index()
    {
        $notifikasis = Notifikasi::all();
        return view('Admin.admin_notifikasi', compact('notifikasis'));
    }

    public function store(Request $request)
    {
        Notifikasi::create($request->all());
        return redirect()->route('admin.notifikasi.index');
    }

    public function edit($id)
    {
        $notifikasi = Notifikasi::findOrFail($id);
        $semuaNotifikasi = Notifikasi::all();
        return view('Admin.admin_notifikasi', [
        'notifikasi' => $notifikasi,
        'semuaNotifikasi' => $semuaNotifikasi,
        'mode' => 'edit'
    ]);
    }

    public function update(Request $request, $id)
    {
        $notifikasi = Notifikasi::findOrFail($id);
        $notifikasi->update($request->all());
        return redirect()->route('admin.notifikasi.index');
    }

    public function destroy($id)
    {
        $notifikasi = Notifikasi::findOrFail($id);
        $notifikasi->delete();
        return redirect()->route('admin.notifikasi.index');
    }
}


