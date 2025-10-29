<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $request->validate([
            'email' => ['required','email'],
            'password' => ['required','string','min:6'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withInput($request->only('email'))->with('status', 'Email tidak terdaftar.');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withInput($request->only('email'))->with('status', 'Password salah.');
        }

        // Simpan sesi
        $request->session()->put('auth_user_id', $user->id);
        $request->session()->put('auth_user_name', $user->name);
        $request->session()->put('auth_user_email', $user->email);
        $request->session()->put('auth_user_role', $user->role);

        if ($user->role === 'admin') {
            return redirect('/admin')->with('status', 'Login berhasil. Selamat datang di Dashboard Admin!');
        }
        
        return redirect('/')->with('status', 'Login berhasil. Selamat datang!');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users'],
            'password' => ['required','string','min:6','confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        // Auto login setelah register
        $request->session()->put('auth_user_id', $user->id);
        $request->session()->put('auth_user_name', $user->name);
        $request->session()->put('auth_user_email', $user->email);
        $request->session()->put('auth_user_role', $user->role);

        return redirect('/')->with('status', 'Registrasi berhasil! Selamat datang di Simplex Game Center.');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('status', 'Anda telah logout.');
    }
}
