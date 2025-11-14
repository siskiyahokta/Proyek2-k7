<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Redirect setelah login
    protected $redirectTo = '/admin/games';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Override redirect path berdasarkan role
    protected function redirectTo()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return '/admin/games';
        }

        return '/home';
    }

    // Custom login form (jika pakai view custom)
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Jika pakai email, bukan username
    public function username()
    {
        return 'email';
    }
}