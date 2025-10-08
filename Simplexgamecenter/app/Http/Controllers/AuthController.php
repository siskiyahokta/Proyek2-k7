<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request): RedirectResponse
    {
        // Demo: validasi sederhana (belum ada autentikasi sebenarnya)
        $request->validate([
            'email' => ['required','email'],
            'password' => ['required','string','min:6'],
        ]);

        // TODO: implementasikan auth sebenarnya (Laravel Auth/Jetstream/fortify)
        return redirect()->route('home')->with('status', 'Login berhasil (demo)');
    }

    public function register(Request $request): RedirectResponse
    {
        // Demo: validasi sederhana (belum membuat user sebenarnya)
        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email'],
            'password' => ['required','string','min:6','confirmed'],
        ]);

        // TODO: simpan user, kemudian login
        return redirect()->route('home')->with('status', 'Registrasi berhasil (demo)');
    }
}
