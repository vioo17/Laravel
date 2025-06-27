<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'password' => 'required',
        ]);

        // Cek login secara manual
        if ($request->nama === 'admin' && $request->password === 'admin') {
            session(['login' => true]);
            return redirect('/dashboard'); // Arahkan ke dashboard
        }

        // Jika gagal login
        return redirect()->back()->with('message', 'Nama atau password salah.');
    }

    // Proses logout
    public function logout(Request $request)
    {
        $request->session()->flush(); // Hapus semua session
        return redirect()->route('login')->with('message', 'Anda telah logout.');
    }
}
