<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Carbon\Carbon;


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
    return redirect('/home');
});
Route::post('/daftar', 'HomeController@daftar')->name('daftar');
Auth::routes();

Route::get('/home', 'MasterController@home')->name('home');
Route::post('/master/store/{table}/{code}', 'MasterController@store')->name('master.store');
Route::get('/master/{table}/{id?}', 'MasterController@view')->name('master');
Route::get('/delete/{table}/{id?}', 'MasterController@delete')->name('delete');
Route::get('/masters/hitung', 'MasterController@hitung')->name('hitung');
Route::post('/masters/hitung_store', 'MasterController@hitung_store')->name('hitung_store');
Route::get('/masters/anggaran', 'MasterController@anggaran')->name('anggaran');
Route::get('/masters/bop', 'MasterController@bop')->name('bop');

