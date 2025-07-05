<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\Pesanan;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $motorMasuk = Motor::all();      // semua data motor masuk
        $motorKeluar = Pesanan::all();   // semua data motor keluar

        // Kelompokkan jumlah keluar berdasarkan id_motor
        $keluarPerMotor = $motorKeluar->groupBy('id_motor')->map(function ($items) {
            return $items->sum('jumlah');
        });

        return view('laporan', compact('motorMasuk', 'motorKeluar', 'keluarPerMotor'));
    }

    public function download()
    {
        $motorMasuk = Motor::all();
        $motorKeluar = Pesanan::with('motor')->get(); 

        $keluarPerMotor = $motorKeluar->groupBy('id_motor')->map(fn($items) => $items->sum('jumlah'));

        $pdf = PDF::loadView('laporan_pdf', compact('motorMasuk', 'motorKeluar', 'keluarPerMotor'));
        return $pdf->download('laporan_motor.pdf');
    }
}
