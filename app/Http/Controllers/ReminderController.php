<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Reminder;


class ReminderController extends Controller
{
    public function showOptions($beasiswa_id)
    {
        $beasiswa = \App\Models\Beasiswa::findOrFail($beasiswa_id);
        return view('reminder.pengaturan', compact('beasiswa'));
    }

    public function store(Request $request)
    {
        Reminder::create([
            'mahasiswa_id' => auth('mahasiswa')->id(),
            'beasiswa_id' => $request->beasiswa_id,
            'waktu_pengingat' => $request->waktu_pengingat,
        ]);

        return redirect()->back()->with('success', 'Reminder berhasil ditambahkan!');

        $userId = auth()->guard('mahasiswa')->id(); // atau 'web' sesuai guard kamu

        // Hitung waktu pengingat
        $beasiswa = \App\Models\Beasiswa::findOrFail($request->beasiswa_id);
        $tanggalTutup = Carbon::parse($beasiswa->tanggal_tutup);

        if ($request->waktu_reminder === 'custom') {
            $reminderTime = Carbon::parse($request->custom_datetime);
        } else {
            $reminderTime = $tanggalTutup->copy()->subDays((int) $request->waktu_reminder);
        }

        if ($reminderTime->isPast()) {
            return back()->with('error', 'Waktu pengingat lebih awal dari waktu sistem saat ini');
        }

    // Simpan ke database
        Reminder::create([
            'mahasiswa_id' => $userId,
            'beasiswa_id' => $request->beasiswa_id,
            'waktu_pengingat' => $reminderTime,
        ]);

        return redirect()->route('dashboard')->with('success', 'Reminder berhasil disimpan!');
    }
}
