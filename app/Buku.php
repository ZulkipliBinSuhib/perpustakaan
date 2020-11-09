<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = [
        'kode_buku', 'judul_buku','penulis_buku','penerbit_buku','tahun_buku'
    ];
}
