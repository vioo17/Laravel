<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Motor;

class PesananController extends Controller
{
    public function create()
    {
        $motorMasuk = Motor::all(); // Ambil data motor untuk ditampilkan di form
        return view('pesanan', compact('motorMasuk'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_motor' => 'required|exists:motors,id_motor',
            'alamat' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'tanggal_terima' => 'required|date',
        ]);

        // Ambil data motor berdasarkan id_motor
        $motor = Motor::where('id_motor', $validated['id_motor'])->first();

        if (!$motor || $motor->jumlah < $validated['jumlah']) {
            return redirect()->back()->with('error', 'Stok motor tidak cukup atau motor tidak ditemukan.');
        }

        // Kurangi stok motor
        $motor->jumlah -= $validated['jumlah'];
        $motor->save();

        // Simpan pesanan tanpa nama dan telepon
        Pesanan::create([
            'id_motor' => $motor->id_motor,
            'alamat' => $validated['alamat'],
            'jumlah' => $validated['jumlah'],
            'tanggal_terima' => $validated['tanggal_terima'],
        ]);

        return redirect()->route('pesanan')->with('message', 'Pesanan berhasil disimpan.');
    }
}

