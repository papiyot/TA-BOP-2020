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

Route::resource('pt','PtController');
Route::resource('dep','DepController');
Route::resource('dasar','DasarController');
Route::resource('detail_dep', 'Detail_depController');
Route::resource('detail_dasar', 'Detail_dasarController');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('simple', 'HomeController@hasil');

Route::get('/Detaildasar/lihat', 'Detail_dasarController@lihat1');
Route::get('/Detaildasar/alokasi', 'Detail_dasarController@alokasi');

Route::get('/Departemen/createPro', 'DepController@pro');

