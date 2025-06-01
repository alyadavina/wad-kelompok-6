<?php

namespace App\Http\Controllers;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
class NotifikasiController extends Controller
{
    public function index()
{
    $notifikasi = Notifikasi::where('mahasiswa_id', auth()->id())->get();
    return view('notifikasi', compact('notifikasi'));
}

public function markAsRead($id)
{
    $notif = Notifikasi::where('id', $id)
              ->where('mahasiswa_id', auth()->id())
              ->firstOrFail();

    $notif->update(['is_read' => 1]);

    return redirect()->back();
}
}
