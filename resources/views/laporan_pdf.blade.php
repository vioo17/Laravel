<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2, h3 {
            text-align: center;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th {
            background: #f0f0f0;
        }
    </style>
</head>
<body>

    <h2>Laporan Motor</h2>

    {{-- MOTOR MASUK --}}
    <h3>Motor Masuk (Stok Saat Ini)</h3>
    <table>
        <thead>
            <tr>
                <th>ID Motor</th>
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
            @php
                $motorUnik = $motorMasuk->unique('id_motor');
            @endphp
            @forelse ($motorUnik as $motor)
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
                    <td>Rp {{ number_format($motor->harga, 0, ',', '.') }}</td>
                    <td>{{ $jumlahSisa >= 0 ? $jumlahSisa : 0 }}</td>
                    <td>{{ $motor->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Data motor masuk kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>

   {{-- MOTOR KELUAR --}}
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
                <th>Jumlah Keluar</th>
                <th>Tanggal Keluar</th>
            </tr>
        </thead>
        <tbody>
            @php
                $kelompokKeluar = $motorKeluar->groupBy('id_motor');
            @endphp

            @forelse ($kelompokKeluar as $id_motor => $pesananGroup)
                @php
                    $motor = $motorMasuk->firstWhere('id_motor', $id_motor);
                    $totalKeluar = $pesananGroup->sum('jumlah');
                    $tanggalTerakhir = $pesananGroup->max('tanggal_terima');
                @endphp
                <tr>
                    <td>{{ $id_motor }}</td>
                    <td>{{ $motor ? $motor->merek : '-' }}</td>
                    <td>{{ $motor ? $motor->tipe : '-' }}</td>
                    <td>{{ $motor ? $motor->tahun : '-' }}</td>
                    <td>{{ $motor ? $motor->kilometer : '-' }}</td>
                    <td>
                        {{ $motor ? 'Rp ' . number_format($motor->harga, 0, ',', '.') : '-' }}
                    </td>
                    <td>{{ $totalKeluar }}</td>
                    <td>{{ \Carbon\Carbon::parse($tanggalTerakhir)->format('d-m-Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Data motor keluar kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>


</body>
</html>
