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
    <h3>Motor Masuk</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Merek</th>
                <th>Tipe</th>
                <th>Tahun Keluar</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($motorMasuk as $motor)
                <tr>
                    <td>{{ $motor->id }}</td>
                    <td>{{ $motor->merek }}</td>
                    <td>{{ $motor->tipe }}</td>
                    <td>{{ $motor->tahun_keluar }}</td>
                    <td>Rp {{ number_format($motor->harga, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Data motor masuk kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- MOTOR KELUAR --}}
    <h3>Motor Keluar</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>Jumlah</th>
                <th>Tanggal Terima</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($motorKeluar as $pesanan)
                <tr>
                    <td>{{ $pesanan->id }}</td>
                    <td>{{ $pesanan->nama }}</td>
                    <td>{{ $pesanan->alamat }}</td>
                    <td>{{ $pesanan->telepon }}</td>
                    <td>{{ $pesanan->merk_motor }}</td>
                    <td>{{ $pesanan->tipe }}</td>
                    <td>{{ $pesanan->jumlah }}</td>
                    <td>{{ \Carbon\Carbon::parse($pesanan->tanggal_terima)->format('d-m-Y') }}</td>
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
