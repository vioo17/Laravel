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
        $motorMasuk = Motor::all();      // dari fitur Tambah Unit
        $motorKeluar = Pesanan::all();   // dari fitur Buat Pesanan

        return view('laporan', compact('motorMasuk', 'motorKeluar'));
    }

   

    public function download()
    {
        $motorMasuk = Motor::all();
        $motorKeluar = Pesanan::all();

        $pdf = PDF::loadView('laporan_pdf', compact('motorMasuk', 'motorKeluar'));
        return $pdf->download('laporan_motor.pdf');
    }
}
