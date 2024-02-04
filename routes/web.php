<?php

use App\Http\Controllers\LandingController;
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

// Route::get('/', function () {
//     return view('frontend.home');
// });
Route::controller(LandingController::class)->group(function(){
    Route::get('/','home')->name('home');
    Route::get('/bk','bk')->name('bimbingan_konseling');
    Route::get('/pendaftaran','pendaftaran')->name('pendaftaran');
    Route::get('/prestasi','prestasi')->name('prestasi');
    Route::get('/kegiatan','kegiatan')->name('kegiatan');
});
