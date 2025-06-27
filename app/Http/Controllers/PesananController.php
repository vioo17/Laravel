<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
{
    public function create()
    {
        return view('pesanan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'tanggal_terima' => 'required|date',
            'tipe' => 'required',
            'merk_motor' => 'required', 
            'jumlah' => 'required|integer',
        ]);

        Pesanan::create($request->all());

        return redirect()->route('pesanan.create')->with('message', 'Pesanan berhasil disimpan!');
    }
}

