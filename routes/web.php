<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});
//Peminjaman


Auth::routes();
Route::get('pengembalian/get_data', 'PengembalianController@ajax_create')->name('pengembalian.ajax_create');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/buku', 'BukuController');
Route::resource('/peminjaman', 'PeminjamanController');
Route::resource('/pengembalian', 'PengembalianController');
Route::resource('/users', 'UsersController');
Route::resource('/peminjam', 'PeminjamController');
Route::get('peminjaman/{id}/dipinjam','PeminjamanController@dipinjam')->name('peminjaman.dipinjam');


