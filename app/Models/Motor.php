<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Motor extends Model
{
    
    protected $fillable = ['id_motor', 'merek', 'tipe', 'tahun', 'kilometer', 'jumlah', 'harga', 'status',];
}
