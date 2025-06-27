<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'logins'; // sesuaikan dengan nama tabel kamu (misal 'logins' atau 'users')
    protected $fillable = ['nama', 'password'];
    public $timestamps = false;
}
