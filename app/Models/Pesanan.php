<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';

    protected $fillable = [
        'nama', 'alamat', 'telepon', 'tanggal_terima', 'tipe', 'merk_motor', 'jumlah'
    ];
}
