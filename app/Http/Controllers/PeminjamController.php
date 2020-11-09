<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PeminjamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data['peminjam'] = DB::table('peminjam')->get();
        return view('peminjam.index',$data);
    }

    public function create()
    {
        
        return view('peminjam.create');
    }
    public function store(Request $request)
    {
        $data = DB::table('peminjam')
                ->where('no_peminjam',$request->no_peminjam)
                ->first();
        if(!empty($data)){
            return redirect()->back()->withErrors("Peminjam dengan no peminjam {$data->no_peminjam} sudah ada . Silahkan masukkan data yang lain !!");       
         }
        $validatedData = $request->validate([
            'no_peminjam' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);
        
            DB::table('peminjam')->insert([
            'no_peminjam'=>$request->no_peminjam,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
             ]);    
             
        return redirect('peminjam')->with('status', 'Data added successfully.');
    }
    public function edit($id)
    {
        $peminjam = DB::table('peminjam')->where('id',$id)->first();
        $data['peminjam'] = $peminjam;
        return view('peminjam.edit',$data); 
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'no_peminjam' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);
        
        DB::table('peminjam')->where('id',$id)->update([
            'no_peminjam'=>$request->no_peminjam,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
        
             ]);    
        return redirect('peminjam')->with('status', 'Data updated successfully.');
    }
    public function destroy($id)
    {
        DB::table('peminjam')->where('id',$id)->delete();
        return redirect('peminjam')->with('status', 'Data deleted successfully .');
    }
   
}
