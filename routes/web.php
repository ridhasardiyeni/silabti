<?php

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


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('mahasiswa','MahasiswaController');
Route::resource('dosen','DosenController');
Route::resource('user','UserController');
Route::resource('prodi', 'ProdiController');
Route::resource('barang','BarangController');
Route::resource('transaksi','TransaksiController');
Route::resource('temp','TempController');
Route::resource('trans','TransController');

Route::get('/laporan/barang', 'LaporanController@barang');
Route::get('/laporan/barang/pdf', 'LaporanController@barangPdf');

Route::get('/laporan/transaksi', 'LaporanController@trans');
Route::get('/laporan/transaksi/pdf', 'LaporanController@transPdf');

