<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $fillable = [
        'tanggal_pinjam','id_buku','petugas','peminjam'
    ];
}
