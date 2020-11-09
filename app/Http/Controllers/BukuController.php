<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data['buku'] = DB::table('buku')->get();
        return view('buku.index',$data);
    }

    public function create()
    {
        
        return view('buku.create');
    }
    public function store(Request $request)
    {
        $data = DB::table('buku')
                ->where('kode_buku',$request->kode_buku)
                ->first();
        if(!empty($data)){
            return redirect()->back()->withErrors("Buku dengan kode buku {$data->kode_buku} sudah ada . Silahkan masukkan buku yang lain !!");       
         }
        $validatedData = $request->validate([
            'kode_buku' => 'required',
            'judul_buku' => 'required',
            'penulis_buku' => 'required',
            'penerbit_buku' => 'required',
            'tahun_buku' => 'required',
        ]);
            DB::table('buku')->insert([
            'kode_buku'=>$request->kode_buku,
            'judul_buku'=>$request->judul_buku,
            'penulis_buku'=>$request->penulis_buku,
            'penerbit_buku'=>$request->penerbit_buku,
            'tahun_buku'=>$request->tahun_buku,
             ]);    
        return redirect('buku')->with('status', 'Data added successfully.');
    }
    public function edit($id)
    {
        $buku = DB::table('buku')->where('id',$id)->first();
        $data['buku'] = $buku;
        return view('buku.edit',$data); 
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_buku' => 'required',
            'judul_buku' => 'required',
            'penulis_buku' => 'required',
            'penerbit_buku' => 'required',
            'tahun_buku' => 'required',
        ]);
        
        DB::table('buku')->where('id',$id)->update([
        'kode_buku'=>$request->kode_buku,
            'judul_buku'=>$request->judul_buku,
            'penulis_buku'=>$request->penulis_buku,
            'penerbit_buku'=>$request->penerbit_buku,
            'tahun_buku'=>$request->tahun_buku,
        
             ]);    
        return redirect('buku')->with('status', 'Data updated successfully.');
    }
    public function destroy($id)
    {
        DB::table('buku')->where('id',$id)->delete();
        return redirect('buku')->with('status', 'Data deleted successfully .');
    }
    public function show($id)
    {
        $buku = DB::table('buku')->where('id',$id)->first();
        $data['buku'] = $buku;
        return view('buku.index',$data); 
    }
}
