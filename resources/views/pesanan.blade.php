@extends('layouts.app')

@section('content')
<style>
    .form-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h2.title {
        text-align: center;
        margin-bottom: 30px;
        font-size: 24px;
        font-weight: bold;
    }

    .success-message {
        color: green;
        margin-bottom: 20px;
        font-weight: 500;
    }

    form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px 40px;
        max-width: 800px;
        width: 100%;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
        font-weight: 500;
    }

    input, select {
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .full-width {
        grid-column: 1 / 3;
        text-align: center;
    }

    button {
        background-color: #6b8f71;
        color: white;
        padding: 10px 30px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }
</style>

<div class="form-wrapper">
    <h2 class="title">Buat Pesanan</h2>

    {{-- Pesan sukses --}}
    @if(session('message'))
        <div class="success-message">{{ session('message') }}</div>
    @endif

    <form method="POST" action="{{ route('pesanan.store') }}">
        @csrf

        {{-- Pilih Motor --}}
        <div class="form-group full-width">
            <label for="id_motor">Pilih Motor</label>
            <select name="id_motor" id="id_motor" required onchange="tampilkanDetailMotor()">
                <option value="">-- Pilih Motor --</option>
                @foreach($motorMasuk as $motor)
                    <option value="{{ $motor->id_motor }}">
                        {{ $motor->id_motor }} - {{ $motor->merek }} {{ $motor->tipe }} ({{ $motor->tahun }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Alamat --}}
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" required>
        </div>

        {{-- Jumlah --}}
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" required min="1">
        </div>

        {{-- Tanggal Terima --}}
        <div class="form-group full-width">
            <label for="tanggal_terima">Tanggal Keluar</label>
            <input type="date" name="tanggal_terima" id="tanggal_terima" required>
        </div>

        {{-- Tombol --}}
        <div class="form-group full-width">
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>


<script>
    const motorData = @json($motorMasuk->keyBy('id_motor'));

    function tampilkanDetailMotor() {
        const selectedId = document.getElementById('id_motor').value;
        const motor = motorData[selectedId];
        if (motor) {
            alert(
                `Detail Motor:\n` +
                `Merek: ${motor.merek}\n` +
                `Tipe: ${motor.tipe}\n` +
                `Tahun: ${motor.tahun}\n` +
                `Kilometer: ${motor.kilometer}\n` +
                `Harga: Rp ${Number(motor.harga).toLocaleString()}`
            );
        }
    }
</script>
@endsection
