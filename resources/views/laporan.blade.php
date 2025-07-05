@extends('layouts.app')

@section('content')
    <div class="laporan-wrapper">
        <h2 class="judul-laporan">Laporan</h2>

        {{-- MOTOR MASUK --}}
        <div class="section">
            <h3>Motor Masuk</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Merk</th>
                        <th>Tipe</th>
                        <th>Tahun Keluar</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($motorMasuk as $motor)
                        <tr>
                            <td>{{ $motor->id }}</td>
                            <td>{{ $motor->merek }}</td>
                            <td>{{ $motor->tipe }}</td>
                            <td>{{ $motor->tahun_keluar }}</td>
                            <td>{{ $motor->harga }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Data Motor Masuk Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- MOTOR KELUAR (PESANAN) --}}
        <div class="section">
            <h3>Motor Keluar</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Merek</th>
                        <th>Tipe</th>
                        <th>Jumlah</th>
                        <th>Tanggal Terima</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($motorKeluar as $pesanan)
                        <tr>
                            <td>{{ $pesanan->id }}</td>
                            <td>{{ $pesanan->nama }}</td>
                            <td>{{ $pesanan->alamat }}</td>
                            <td>{{ $pesanan->telepon }}</td>
                            <td>{{ $pesanan->merk_motor }}</td>
                            <td>{{ $pesanan->tipe }}</td>
                            <td>{{ $pesanan->jumlah }}</td>
                            <td>{{ $pesanan->tanggal_terima }}</td>
                        </tr>
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
