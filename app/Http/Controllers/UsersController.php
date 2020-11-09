<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data['users'] = DB::table('users')->get();

        return view('users.index',$data);
    }

    public function create()
    {
        return view('users.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'nama' => 'required',
            'password' => 'required',
            'role' =>'required'
            
            
            
        ]);
        
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => 'petugas',
            'password' => Hash::make($request['password'])
        ]);
        return redirect('users')->with('status', 'Data added successfully, please add new data .');
    }
    public function edit($id)
    {
        $users = DB::table('users')->where('id',$id)->first();
        $data['users'] = $users;
        return view('users.edit',$data); 
    }

    public function show($id){
        //
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'nama' => 'required',
            'password' => 'required',
        ]);
        
       DB::table('users')->where('id',$id)->update([
            'nama' => $request['nama'],
            'email' => $request['email'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'tipe' => 'petugas',
            'password' => Hash::make($request['password'])
             ]);    
        
        
        return redirect('users')->with('status', 'Data updated successfully.');
    }
    public function destroy($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect('users')->with('status', 'Data deleted successfully .');
    }
}
