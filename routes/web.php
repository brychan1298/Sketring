<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/umkm', function(){
    return view('umkm.beranda');
});

Route::get('/listkeranjang', function(){
    return view('konsumen.ListKeranjang');
});

Route::get('/profilekonsumen', function(){
    return view('konsumen.profile');
});

Route::get('/keranjang', function(){
    return view('konsumen.keranjang');
});
