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

    input {
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

    {{-- Menampilkan pesan sukses jika ada --}}
    @if(session('message'))
        <div class="success-message">{{ session('message') }}</div>
    @endif

    <form method="POST" action="{{ route('pesanan.store') }}">
        @csrf

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" required>
        </div>

        <div class="form-group">
            <label for="tipe">Tipe</label>
            <input type="text" name="tipe" id="tipe" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" required>
        </div>

        <div class="form-group">
            <label for="merk_motor">Merk Motor</label>
            <input type="text" name="merk_motor" id="merk_motor" required>
        </div>

        <div class="form-group">
            <label for="telepon">Nomor Telepon</label>
            <input type="text" name="telepon" id="telepon" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" required>
        </div>

        <div class="form-group full-width">
            <label for="tanggal_terima">Tanggal Terima</label>
            <input type="date" name="tanggal_terima" id="tanggal_terima" required>
        </div>

        <div class="form-group full-width">
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection
