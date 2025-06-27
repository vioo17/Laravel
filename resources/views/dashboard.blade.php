@extends('layouts.app')

@section('content')
    <div class="form-wrapper">
        {{-- Judul Teks Tengah Atas --}}
        <h2 class="judul-form">Tambah Unit Motor</h2>

        @if ($errors->any())
            <div class="alert" style="color: red">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form action="{{ route('motor.store') }}" method="POST" class="form-motor">
        @csrf
        <div class="form-group">
            <label for="merek">Merk Motor</label>
            <input type="text" id="merek" name="merek" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" id="harga" name="harga" required>
        </div>

        <div class="form-group">
            <label for="tipe">Tipe</label>
            <input type="text" id="tipe" name="tipe" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="text" id="jumlah" name="jumlah" required>
        </div>

        <div class="form-group">
            <label for="tahun_keluar">Tahun Keluar</label>
            <input type="text" id="tahun_keluar" name="tahun_keluar" required>
        </div>

        <button type="submit">Input</button>
    </form>
    </div>

    <style>
        .form-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .judul-form {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-motor {
            background-color: #f9f9f9;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button {
            background-color: #6b8f71;
            color: white;
            padding: 12px 30px;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #5a7960;
        }
    </style>
@endsection
