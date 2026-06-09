<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('auth.login');
    }

    // Memproses data login
    public function authenticate(Request $request)
    {
        // 1. Validasi input yang masuk (kita ubah 'email' menjadi 'login_id')
        $request->validate([
            'login_id' => ['required', 'string'],
            'password' => ['required'],
        ]);

        // 2. Cek apakah input berupa format email yang valid atau username
        $loginType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // 3. Susun kredensial berdasarkan hasil cek di atas
        $credentials = [
            $loginType => $request->login_id,
            'password' => $request->password,
        ];

        // 4. Proses attempt login bawaan Laravel
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek status admin dan is_active
            if ($user->isAdmin() && $user->is_active) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }

            // Jika bukan admin, logout paksa
            Auth::logout();
            return back()->withErrors([
                'login_error' => 'Akses ditolak! Akun ini bukan Administrator.',
            ])->withInput($request->only('login_id'));
        }

        // Jika email/username atau password salah
        return back()->withErrors([
            'login_error' => 'Email/Username atau password salah.',
        ])->withInput($request->only('login_id'));
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}