<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
<<<<<<< HEAD
        return view('auth.login');
=======
        return view('login');
>>>>>>> origin/Davy_brench
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
<<<<<<< HEAD
        if (!Auth::user()->attempt($request->only('email', 'password'))) {
            return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);

=======
        if (!Auth::guard('mahasiswa')->attempt($request->only('email', 'password'))) {
        return back()->withErrors(['email' => 'Email atau password salah']);
>>>>>>> origin/Davy_brench
        }

        $request->session()->regenerate();

<<<<<<< HEAD
        return redirect()->intended(route('dashboard', absolute: false));
=======
        return redirect()->intended(route('dashboard'));
>>>>>>> origin/Davy_brench
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
<<<<<<< HEAD
        Auth::user()->logout();
=======
        Auth::guard('mahasiswa')->logout();
>>>>>>> origin/Davy_brench

        $request->session()->invalidate();

        $request->session()->regenerateToken();

<<<<<<< HEAD
        return redirect('/');
=======
        return redirect('/login');
>>>>>>> origin/Davy_brench
    }
}
