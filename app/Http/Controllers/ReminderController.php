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
        $request->validate([
            'beasiswa_id' => 'required|exists:beasiswas,id',
            'waktu_reminder' => 'required',
        ]);

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

        Reminder::create([
            'mahasiswa_id' => auth('mahasiswa')->id(),
            'beasiswa_id' => $request->beasiswa_id,
            'waktu_pengingat' => $reminderTime,
        ]);

        return redirect()->back()->with('success', 'Reminder berhasil ditambahkan!');
    }

    public function index()
    {
        $reminders = Reminder::with('beasiswa')
            ->where('mahasiswa_id', auth('mahasiswa')->id())
            ->orderBy('waktu_pengingat', 'asc')
            ->get();

        return view('reminder.index', compact('reminders'));
    }   

    public function destroy($id)
    {
        $reminder = Reminder::findOrFail($id);

        $reminder->delete();
        return redirect()->back()->with('success', 'Reminder berhasil dihapus!');
    }

}
