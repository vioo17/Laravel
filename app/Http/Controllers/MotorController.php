<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;

class MotorController extends Controller
{
    public function create()
    {
        if (!session('login')) {
            return redirect('/')->with('message', 'Silakan login terlebih dahulu.');
        }

        return view('dashboard'); // tampilkan form tambah motor
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'merek' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tipe' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'tahun_keluar' => 'required|integer|min:2005|max:' . date('Y'),
        ]);

        Motor::create($validated);

        return redirect('/dashboard')->with('success', 'Data motor berhasil ditambahkan!');
    }
}
