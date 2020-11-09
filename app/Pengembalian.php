<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'pengembalian';
    protected $fillable = [
        'tanggal_kembali','id_buku','peminjam','petugas'
    ];
}
