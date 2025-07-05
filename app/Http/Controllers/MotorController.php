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

        return view('dashboard'); // atau view form motor jika terpisah: view('motor.create')
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_motor' => 'required|string',
            'merek' => 'required|string',
            'tipe' => 'required|string',
            'tahun' => 'required|integer',
            'kilometer' => 'required|integer',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|integer',
            'status' => 'required|string',
        ]);

        // Cek apakah id_motor sudah ada
        $motor = Motor::where('id_motor', $validated['id_motor'])->first();

        if ($motor) {
            // Update stok (jumlah)
            $motor->jumlah += $validated['jumlah'];
            $motor->save();
        } else {
            // Simpan motor baru
            Motor::create($validated);
        }

        return redirect()->back()->with('success', 'Motor berhasil ditambahkan atau diperbarui.');
    }
}
