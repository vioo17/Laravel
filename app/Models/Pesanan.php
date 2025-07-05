<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
     protected $table = 'pesanans';

    protected $fillable = [
        'id_motor', 'alamat', 'tanggal_terima', 'jumlah'
    ];

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'id_motor', 'id_motor');
    }
}
