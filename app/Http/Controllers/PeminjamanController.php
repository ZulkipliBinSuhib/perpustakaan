<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $from_date = $request ->from_date;
        $to_date = $request ->to_date;
        $peminjaman_detail = DB::table('peminjaman')
                            ->join('buku','peminjaman.buku','=','buku.id')
                            ->join('peminjam','peminjaman.peminjam','=','peminjam.id')
                            ->select('peminjam.nama','peminjaman.id','peminjaman.tanggal_pinjam','peminjaman.peminjam','peminjaman.petugas','buku.judul_buku')->where('peminjaman.id',1)
                            ->get();
        if(isset($request->from_date)){
            $peminjaman = DB::table('peminjaman');
            $peminjaman = DB::table('peminjaman')
                        ->join('buku','peminjaman.buku','=','buku.id')
                        ->join('peminjam','peminjaman.peminjam','=','peminjam.id')
                        ->select('peminjam.nama','peminjaman.id','peminjaman.tanggal_pinjam','peminjaman.peminjam','peminjaman.petugas','buku.judul_buku')
                        ->whereBetween('tanggal_pinjam', array($from_date, $to_date))
                        ->get();
        }else{
            $peminjaman = DB::table('peminjaman');
            $peminjaman = DB::table('peminjaman')
                        ->join('buku','peminjaman.buku','=','buku.id')
                        ->join('peminjam','peminjaman.peminjam','=','peminjam.id')
                        ->select('peminjam.nama','peminjaman.id','peminjaman.tanggal_pinjam','peminjaman.peminjam','peminjaman.petugas','buku.judul_buku')
                        ->get();
        }        
        $data['peminjaman'] = $peminjaman;   
        $data['peminjaman_detail'] = $peminjaman_detail;   
        return view('peminjaman.index',$data);
    }

    public function create()
    {
        $data['data_buku'] = DB::table('buku')->get();
        $data['peminjam'] = DB::table('peminjam')->get();
        $petugas =  Auth::user()->name ;
        $data['petugas'] =  $petugas ;
        return view('peminjaman.create',$data);
    }
    public function store(Request $request)
    {
        $data = DB::table('peminjaman')
                ->where('tanggal_pinjam',$request->kode_buku)
                ->where('buku',$request->buku)
                ->where('peminjam',$request->peminjam)
                ->first();
        if(!empty($data)){
            return redirect()->back()->withErrors("Peminjaman tanggal {$data->tanggal_pinjam} dengan buku {$data->buku} oleh {$data->peminjam} sudah dilakukan . Silahkan masukkan data yang lain !!");       
         }
        $validatedData = $request->validate([
            'tanggal_pinjam' => 'required',
            'buku' => 'required',
            'peminjam' => 'required',
            'petugas' => 'required',
        ]);
        
            DB::table('peminjaman')->insert([
            'tanggal_pinjam'=>$request->tanggal_pinjam,
            'buku'=>$request->buku,
            'peminjam'=>$request->peminjam,
            'petugas'=>$request->petugas,
             ]);    
             
        return redirect('peminjaman')->with('status', 'Data added successfully.');
    }
    public function edit($id)
    {
        $peminjaman = DB::table('peminjaman')->where('id',$id)->first();
        $data['peminjaman'] = $peminjaman;
        return view('peminjaman.edit',$data); 
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tanggal_pinjam' => 'required',
            'buku' => 'required',
            'peminjam' => 'required',
            'petugas' => 'required',
        ]);
        
        DB::table('peminjaman')->where('id',$id)->update([
            'tanggal_pinjam'=>$request->tanggal_pinjam,
            'buku'=>$request->buku,
            'peminjam'=>$request->peminjam,
            'petugas'=>$request->petugas,
        
             ]);    
        return redirect('peminjaman')->with('status', 'Data updated successfully.');
    }
    public function destroy($id)
    {
        DB::table('peminjaman')->where('id',$id)->delete();
        return redirect('peminjaman')->with('status', 'Data deleted successfully .');
    }
    public function show($id)
    {
        
        $peminjaman = DB::table('peminjaman')
                    ->join('buku','peminjaman.buku','=','buku.id')
                    ->select('peminjaman.tanggal_pinjam','peminjaman.petugas','peminjaman.peminjam','buku.judul_buku')            
                    ->where('id',$id)->first();
        $data['peminjaman'] = $peminjaman;
        return view('peminjaman.index',$data); 
    }
}
