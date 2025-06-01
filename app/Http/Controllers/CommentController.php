<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Beasiswa;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'beasiswa_id' => 'required|exists:beasiswas,id',
            'comment' => 'required|string|max:1000',
        ]);
    

    Comment::create([
            'beasiswa_id' => $request->beasiswa_id,
            'userId' => auth()->guard('mahasiswa')->id(),
            'comment' => $request->comment,
        ]);

    return back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function show($beasiswaId)
    {
        $beasiswa = Beasiswa::findOrFail($beasiswaId);
        $comments = Comment::where('beasiswa_id', $beasiswaId)
            ->with('mahasiswa')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('comments.show', compact('beasiswa', 'comments'));
    }
}
