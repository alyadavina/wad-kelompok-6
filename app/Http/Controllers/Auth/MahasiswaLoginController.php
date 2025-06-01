<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
=======
use App\Models\Notifikasi;
>>>>>>> origin/Davy_brench
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaLoginController extends Controller
{
    public function showLoginForm()
    {
<<<<<<< HEAD
        return view('auth.login'); // Pakai view login yang sudah ada
=======
        return view('login'); 
>>>>>>> origin/Davy_brench
    }

    public function login(Request $request)
    {
<<<<<<< HEAD
        $this->validate($request, [
=======
        $request->validate([  
>>>>>>> origin/Davy_brench
            'email' => 'required|email',
            'password' => 'required'
        ]);

<<<<<<< HEAD
        if (Auth::user()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            return redirect()->intended('/dashboard'); // Ubah sesuai dashboard mahasiswa
=======
        if (Auth::guard('mahasiswa')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            return redirect()->intended('/dashboard'); 
>>>>>>> origin/Davy_brench
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout()
    {
<<<<<<< HEAD
        Auth::user()->logout();
=======
        Auth::guard('mahasiswa')->logout();
>>>>>>> origin/Davy_brench
        return redirect('/login');
    }
}
