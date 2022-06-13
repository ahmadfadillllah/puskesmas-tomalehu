<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienBaruController;

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
    return view('welcome');
})->name('home');

Route::get('/contact', 'ServerController@contact')->name('contact');
Route::post('/postcontact', 'ServerController@postcontact')->name('postcontact');

//Auth
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin')->name('postlogin');

Route::get('/logout', 'AuthController@logout')->name('logout');

//Pasien
Route::get('/pasien-baru', 'PasienBaruController@index')->name('pasienBaru');
Route::post('/pasien-baru/create', 'PasienBaruController@create')->name('tambahpasienBaru');

Route::get('/pasien-lama', 'PasienLamaController@index')->name('pasienLama');
Route::post('/tambah-antrian', 'PasienLamaController@tambahantrian')->name('tambahantrian');

Route::post('/view-pasien', 'PasienLamaController@view')->name('viewPasien');

Route::post('/update-kode', 'PasienLamaController@updateKode')->name('updateKode');


Route::group(['middleware' => 'auth'], function(){

    //Server
    Route::get('/get', 'ServerController@list')->name('listPasien');
    Route::get('/serv', 'ServerController@index')->name('server');


    //Daftar Pasien
    Route::get('/daftar-pasien', 'PasienController@index')->name('daftar-pasien');
    Route::get('/daftar-pasien/{id_pasien}/pasien', 'PasienController@editPasien');
    Route::post('/daftar-pasien/{id_pasien}/updatepasien', 'PasienController@updatepasien');

    //Antrian
    Route::get('/antrian', 'AntrianController@index')->name('antrian');
    Route::get('/antrian/{nomor_antrian}/keluhan', 'AntrianController@keluhan');
    Route::post('/antrian/{nomor_antrian}/updatekeluhan', 'AntrianController@updatekeluhan');
    Route::get('/antrian/{nomor_antrian}/skip', 'AntrianController@skip');

    Route::get('/lihat-antrian', 'AntrianController@lihatAntrian')->name('lihatAntrian');
    Route::post('/validate-antrian', 'AntrianController@validateAntrian')->name('validateAntrian');
    Route::post('/lihat-antrian/cetak', 'AntrianController@cetakAntrian')->name('cetakAntrian');

});

