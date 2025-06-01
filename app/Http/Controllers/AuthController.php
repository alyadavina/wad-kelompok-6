<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    // //public function showRegisterForm()
    // {
    //     return view('auth.register');
    // }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,mahasiswa',
        ]);

        // Validasi domain email berdasarkan role
        if ($request->role === 'mahasiswa' && !str_ends_with($request->email, '@student.telkomuniversity.ac.id')) {
            return back()->withErrors(['email' => 'Email mahasiswa harus menggunakan domain @student.telkomuniversity.ac.id']);
        }

        if ($request->role === 'admin' && !str_ends_with($request->email, '@telkomuniversity.ac.id')) {
            return back()->withErrors(['email' => 'Email admin harus menggunakan domain @telkomuniversity.ac.id']);
        }

        // Simpan user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke form login
        return redirect()->route('login.form')->with('success', 'Pendaftaran berhasil. Silakan login.');
    }

    public function showRegisterForm()
    {
        if (!view()->exists('auth.register')) {
            abort(500, 'View auth.register tidak ditemukan!');
        }

        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            
            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            } elseif ($user->role === 'mahasiswa') {
                return redirect()->route('dashboard');
            } else {
               // Auth::logout();
                return redirect()->route('login.form')->withErrors(['email' => 'Role tidak dikenali.']);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
}

// ini hana