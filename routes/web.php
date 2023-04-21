<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;

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

Route::get('/virtualAccount', function () {
    return view('konsumen.virtualAccount');
});

Route::get('/chat', function () {
    return view('konsumen.chat');
});

Route::get('/listKeranjang', function(){
    return view('konsumen.ListKeranjang');
});

Route::get('/profileKonsumen', function(){
    return view('konsumen.profile');
})->middleware("auth");

Route::get('/editProfile', function(){
    return view('konsumen.editprofile');
});

Route::get('/keranjang', function(){
    return view('konsumen.keranjang');
});

Route::get('/umkm', function(){
    return view('umkm.beranda');
});

Route::get('/cari', function(){
    return view('konsumen.cari');
});

Route::get('/pesananKonsumen', function(){
    return view('konsumen.pesanan');
});

Route::get('/detailPesanan', function(){
    return view('konsumen.detailPesanan');
});

Route::get('/pesananMasuk', function(){
    return view('umkm.pesananMasuk');
});

Route::get('/pesananUmkm', function(){
    return view('umkm.pesanan');
});

Route::get('/dashboard',[ProdukController::class,'index']);

Route::get('/tambahProduk', function(){
    return view('umkm.tambahProduk');
});

Route::get('/profileToko', function(){
    return view('umkm.profileToko');
});

Route::get('/editProduk', function(){
    return view('umkm.editProduk');
});

Route::get('/editProfileToko', function(){
    return view('umkm.editProfileToko');
});







Route::get('/detailproduk', function(){
    return view('konsumen.detailProduk');
});
















Route::post('/tambahProduk',[ProdukController::class,'store']);


Route::get('/editprofile',[LoginController::class,'edit']);
Route::put('/konsumen/update',[LoginController::class,'update']);

Route::group(['prefix'=>'register'], function(){
    // Route::get('/',[RegisterController::class,'index']);
    Route::get('/{roleId}',[RegisterController::class,'index']);
    Route::post('/',[RegisterController::class,'store']);

    Route::get('/', function(){
        return view('PilihRole');
    });
});
Route::post('api/fetch-kota', [RegisterController::class, 'fetchKota']);

Route::get('/login',[LoginController::class,'index'])->middleware('guest');
Route::post('/login',[LoginController::class,'store']);
Route::post('/logout',[LoginController::class,'logout']);

Route::get('/form',[IndoRegionController::class,'form'])->name('form');
Route::post('api/fetch-kota', [IndoRegionController::class, 'fetchState']);
