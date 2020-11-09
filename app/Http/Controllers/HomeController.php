<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $n = date('Y-m-d');
        $tanggal_kembali = date('Y-m-d', strtotime('+7 day', strtotime( $n )));
        $get_data = DB::table('peminjaman')
                ->join('buku','buku.id','=','peminjaman.buku')
                ->join('peminjam','peminjaman.peminjam','=','peminjam.id')
                ->join('pengembalian','buku.id','=','pengembalian.buku')
                ->select('pengembalian.tanggal_kembali','peminjaman.tanggal_pinjam','buku.judul_buku','peminjaman.peminjam','peminjam.nama')
                ->orderBy('peminjaman.id')->get();
        
        $data['get_data'] = $get_data;
        return view('home',$data);
    }
}
