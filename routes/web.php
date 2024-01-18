<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PlaylistController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;

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
});

Auth::routes();

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Kategori
Route::resource('kategori', KategoriController::class);
Route::get('/kategori/{id}/edit', 'KategoriController@edit')->name('kategori.edit');
Route::put('/kategori/{id}', 'KategoriController@update')->name('kategori.update');
Route::delete('/kategori/{id}', 'KategoriController@destroy')->name('kategori.destroy');

//artikel
Route::resource('artikel', ArtikelController::class);

//playlist
Route::resource('playlist', PlaylistController::class);