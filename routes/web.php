<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndoRegionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('konsumen.beranda');
});

Route::get('/virtualaccount', function () {
    return view('konsumen.virtualAccount');
});

Route::get('/chat', function () {
    return view('konsumen.chat');
});

Route::get('/listkeranjang', function(){
    return view('konsumen.ListKeranjang');
});

Route::get('/keranjang', function(){
    return view('konsumen.keranjang');
});

Route::get('/umkm', function(){
    return view('umkm.beranda');
});

Route::get('/dashboard', function(){
    return view('umkm.dashboard');
});

Route::get('/tambahProduk', function(){
    return view('umkm.tambahProduk');
});
































Route::group(['prefix'=>'register'], function(){
    Route::get('/',function(){
        return view('register');
    });

    Route::get('/role', function(){
        return view('PilihRole');
    });
});

Route::get('/login',function(){
    return view('login');
});

Route::get('/form',[IndoRegionController::class,'form'])->name('form');
Route::post('api/fetch-states', [IndoRegionController::class, 'fetchState']);
