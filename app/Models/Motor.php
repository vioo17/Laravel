<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Motor extends Model
{
    
    protected $fillable = ['merek', 'harga', 'tipe', 'jumlah', 'tahun_keluar'];
}
