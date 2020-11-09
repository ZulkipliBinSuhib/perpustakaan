<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Peminjaman;

class PengembalianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $from_date = $request ->from_date;
        $to_date = $request ->to_date;
        $id = $request ->id ;
        if(isset($request->from_date)){
            $pengembalian = DB::table('pengembalian');
            $pengembalian = DB::table('pengembalian')
                        ->join('buku','pengembalian.buku','=','buku.id')
                        ->join('peminjam','pengembalian.peminjam','=','peminjam.id')
                        ->select('peminjam.nama','pengembalian.id','pengembalian.tanggal_kembali','pengembalian.peminjam','pengembalian.petugas','buku.judul_buku')
                        ->whereBetween('tanggal_kembali', array($from_date, $to_date))
                        ;
        }else{
            $pengembalian = DB::table('pengembalian');
            $pengembalian = DB::table('pengembalian')
                        ->join('buku','pengembalian.buku','=','buku.id')
                        ->join('peminjam','pengembalian.peminjam','=','peminjam.id')
                        ->select('peminjam.nama','pengembalian.id','pengembalian.tanggal_kembali','pengembalian.peminjam','pengembalian.petugas','buku.judul_buku')
                        ;
        }      
        
        $data['pengembalian'] = $pengembalian ->get();   
        if(($id)){
            $pengembalian = $pengembalian->where('pengembalian.id',$id)->get();
            }
        return view('pengembalian.index',$data);
    }

    public function create()
    {
        $data['date'] = date('Y-m-d');
        $data['data_buku'] = DB::table('buku')->get();
        $data['peminjam'] = DB::table('peminjaman')
                                ->join('buku','peminjaman.buku','=','buku.id')
                                ->join('peminjam','peminjam.id','=','peminjaman.peminjam')
                                ->select('peminjaman.peminjam','peminjaman.tanggal_pinjam','buku.judul_buku','peminjaman.id','peminjam.nama')                        
                                ->get();
        $petugas =  Auth::user()->name ;
        $data['petugas'] =  $petugas ;
        return view('pengembalian.create',$data);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_kembali' => 'required',
            'buku' => 'required',
            'peminjam' => 'required',
            'petugas' => 'required',
        ]);
            DB::table('pengembalian')->insert([
            'tanggal_kembali'=>$request->tanggal_kembali,
            'buku'=>$request->buku,
            'peminjam'=>$request->buku,
            'petugas'=>$request->petugas,
             ]);    
        return redirect('pengembalian')->with('status', 'Data added successfully.');
    }
    public function edit($id)
    {
        $pengembalian = DB::table('pengembalian')->where('id',$id)->first();
        $data['pengembalian'] = $pengembalian;
        return view('pengembalian.edit',$data); 
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tanggal_kembali' => 'required',
            'buku' => 'required',
            'petugas' => 'required',
        ]);
        
        DB::table('pengembalian')->where('id',$id)->update([
            'tanggal_kembali'=>$request->tanggal_kembali,
            'buku'=>$request->buku,
            'petugas'=>$request->petugas,
        
             ]);    
        return redirect('pengembalian')->with('status', 'Data updated successfully.');
    }
    public function destroy($id)
    {
        DB::table('pengembalian')->where('id',$id)->delete();
        return redirect('pengembalian')->with('status', 'Data deleted successfully .');
    }
    public function show($id)
    {
        $pengembalian = DB::table('pengembalian')
                    ->join('buku','pengembalian.buku','=','buku.id')
                    ->select('pengembalian.tanggal_kembali','pengembalian.petugas','pengembalian.peminjam','buku.judul_buku')            
                    ->where('id',$id)->first();
        $data['pengembalian'] = $pengembalian;
        return view('pengembalian.index',$data); 
    }
    public function ajax_create(Request $request){
        $get = $request->get;
        $get_data= Peminjaman::where('peminjaman.id','=',$get)
                    ->join('buku','buku.id','=','peminjaman.buku')
                    ->select('peminjaman.peminjam','buku.judul_buku','peminjaman.id','peminjaman.buku')
        ->first();
        if(isset($get_data)){
            $data = array(
                'buku' => $get_data['buku'],
            ); 
        return response()->json($data);
        }
  }
}


