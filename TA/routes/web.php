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
    return view('auth.login');
});

Route::resource('pt', 'PtController');
Route::resource('dep', 'DepController');
Route::resource('dasar', 'DasarController');
Route::resource('detail_dep', 'Detail_depController');
Route::resource('detail_dasar', 'Detail_dasarController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('simple', 'HomeController@hasil');

Route::get('/Detaildasar/lihat', 'Detail_dasarController@lihat1');
Route::get('/Detaildasar/lihat1', 'Detail_dasarController@lihat2');

Route::get('/Detaildasar/alokasi', 'Detail_dasarController@alokasi');

Route::get('/Detaildasar/createPro', 'Detail_dasarController@pro');
Route::get('/Detaildasar/anggaran_pdf', 'Detail_dasarController@cetak_anggaran');
Route::get('/Detaildasar/alokasi_pdf', 'Detail_dasarController@cetak_alokasi');

Route::get('/Detaildasar/det_pdf', 'Detail_dasarController@cetak_det');

Route::get('/detaildepar/detaildep_pdf', 'Detail_depController@cetak_pdf');

Route::get('/Departemen/depar_pdf', 'DepController@cetak_pdf');

Route::get('/Dasar/dasar_pdf', 'DasarController@cetak_pdf');

Route::get('/Departemen/pete_pdf', 'DepController@cetak_pete');