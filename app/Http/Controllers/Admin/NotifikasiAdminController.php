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
        return view('Admin.admin_notifikasi_edit', compact('notifikasi'));
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


