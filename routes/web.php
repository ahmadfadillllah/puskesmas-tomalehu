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

Route::get('/login', function () {
    return view('login');
})->name('login');


//Pasien
Route::get('/pasien-baru', 'PasienBaruController@index')->name('pasienBaru');
Route::post('/pasien-baru/create', 'PasienBaruController@create')->name('tambahpasienBaru');

Route::get('/pasien-lama', 'PasienLamaController@index')->name('pasienLama');

Route::post('/view-pasien', 'PasienLamaController@view')->name('viewPasien');
