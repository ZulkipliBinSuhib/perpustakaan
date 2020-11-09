<?php

namespace App\Http\Controllers;

use App\Peminjaman;
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
        // $n = date('Y-m-d');
        // $m = Peminjaman::select('tanggal_pinjam')->get();
        // $tanggal_kembali = date('Y-m-d', strtotime('+7 day', strtotime( $n )));

        // $a = 1 ;
        // $tgl_pinjam = DB::table('peminjaman')->select('tanggal_pinjam')->where('status',$a)->first();
        // $tgl_kembali = DB::table('peminjaman')->select('tanggal_kembali')->where('status',$a)->first();
        $get_data = DB::table('peminjaman')
                ->join('buku','buku.id','=','peminjaman.buku')
                ->join('peminjam','peminjaman.peminjam','=','peminjam.id')
                ->select('peminjaman.tanggal_kembali','peminjaman.tanggal_pinjam','buku.judul_buku','peminjaman.peminjam','peminjam.nama')
                ->where('peminjaman.tanggal_kembali')
                ->orderBy('peminjaman.id')->get();
       
        $data['get_data'] = $get_data;
        return view('home',$data);
    }
}
