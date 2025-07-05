@extends('layouts.app')

@section('content')
<div class="laporan-wrapper">
    <h2 class="judul-laporan">Laporan</h2>

    {{-- MOTOR MASUK --}}
    <div class="section">
        <h3>Motor Masuk (Stok Saat Ini)</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Merek</th>
                    <th>Tipe</th>
                    <th>Tahun</th>
                    <th>Kilometer</th>
                    <th>Harga</th>
                    <th>Jumlah (Stok)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($motorMasuk as $motor)
                    @php
                        $jumlahMasuk = $motorMasuk->where('id_motor', $motor->id_motor)->sum('jumlah');
                        $jumlahKeluar = $motorKeluar->where('id_motor', $motor->id_motor)->sum('jumlah');
                        $jumlahSisa = $jumlahMasuk - $jumlahKeluar;
                    @endphp
                    <tr>
                        
                        <td>{{ $motor->id_motor }}</td>
                        <td>{{ $motor->merek }}</td>
                        <td>{{ $motor->tipe }}</td>
                        <td>{{ $motor->tahun }}</td>
                        <td>{{ $motor->kilometer }}</td>
                        <td>Rp {{ number_format($motor->harga) }}</td>
                        <td>{{ $jumlahSisa >= 0 ? $jumlahSisa : 0 }}</td>
                        <td>{{ $motor->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Data Motor Masuk Kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- MOTOR KELUAR --}}
<div class="section">
    <h3>Motor Keluar</h3>
    <table>
        <thead>
            <tr>
                <th>ID Motor</th>
                <th>Merek</th>
                <th>Tipe</th>
                <th>Tahun</th>
                <th>Kilometer</th>
                <th>Harga</th>
                <th>Jumlah Terjual</th>
                <th>Tanggal Keluar Terakhir</th>
            </tr>
        </thead>
        <tbody>
            @php
                $kelompokKeluar = $motorKeluar->groupBy('id_motor');
            @endphp

            @forelse($kelompokKeluar as $id_motor => $pesananGroup)
                @php
                    $motor = $motorMasuk->firstWhere('id_motor', $id_motor);
                    $totalKeluar = $pesananGroup->sum('jumlah');
                    $tanggalTerakhir = $pesananGroup->max('tanggal_terima');
                @endphp

                @if($motor)
                    <tr>
                        <td>{{ $id_motor }}</td>
                        <td>{{ $motor->merek }}</td>
                        <td>{{ $motor->tipe }}</td>
                        <td>{{ $motor->tahun }}</td>
                        <td>{{ $motor->kilometer }}</td>
                        <td>Rp {{ number_format($motor->harga) }}</td>
                        <td>{{ $totalKeluar }}</td>
                        <td>{{ \Carbon\Carbon::parse($tanggalTerakhir)->format('d-m-Y') }}</td>
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="8">Data Motor Keluar Kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

    {{-- TOMBOL CETAK --}}
    <div class="cetak-btn-wrapper">
        <a href="{{ route('laporan.download') }}" class="btn-cetak">Cetak</a>
    </div>
</div>

{{-- STYLE --}}
<style>
    .laporan-wrapper {
        padding: 20px 40px;
    }

    .judul-laporan {
        text-align: center;
        font-size: 24px;
        margin-bottom: 30px;
    }

    .section {
        margin-bottom: 40px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
    }

    th, td {
        border: 1px solid #aaa;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #f0f0f0;
    }

    .cetak-btn-wrapper {
        display: flex;
        justify-content: flex-end;
        padding-right: 20px;
    }

    .btn-cetak {
        background-color: #6b8f71;
        color: white;
        padding: 10px 30px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-cetak:hover {
        background-color: #5e7e65;
    }
</style>
@endsection
