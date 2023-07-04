<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiDetailController;
use App\Http\Controllers\UmkmPesananController;
use App\Models\Keranjang;
use App\Models\User;

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

// Route::get('/',[KeranjangController::class, 'CartCount']);

// Route::get('/', function () {
//     return view('konsumen.beranda');
// })->middleware('forbidumkm');
Route::get('/', [UserController::class, 'home'])->middleware('forbidumkm')->name('beranda');

Route::get('/virtualaccount', function () {
    return view('konsumen.virtualAccount');
});

Route::get('/chat', function () {
    return view('konsumen.chat');
});




Route::get('/profileKonsumen', function(){
    return view('konsumen.profile');
})->middleware("auth");

Route::get('/editProfile', function(){
    return view('konsumen.editprofile');
});





Route::get('/konsumen/cari', [ProdukController::class,'konsumenIndex'])->name('cari');
Route::get('/konsumen/search', [ProdukController::class,'konsumenSearch']);
Route::get('/konsumen/filter-produk',[ProdukController::class, 'filterProduk']);

Route::get('/pesananKonsumen', function(){
    return view('konsumen.pesanan');
});

Route::get('/detailPesanan', function(){
    return view('konsumen.detailPesanan');
});

Route::get('/tarikSaldo', function(){
    return view('konsumen.saldo');
});

Route::get('/tarikDebit', function(){
    return view('konsumen.debit');
});

Route::get('/tarikEmoney', function(){
    return view('konsumen.emoney');
});

Route::get('/tarikSaldoUMKM', function(){
    return view('umkm.saldo');
});

Route::get('/tarikDebitUMKM', function(){
    return view('umkm.debit');
});

Route::get('/tarikEmoneyUMKM', function(){
    return view('umkm.emoney');
});

Route::get('/pembayaran', function(){
    return view('konsumen.pembayaran');
});

Route::get('/pesananMasuk', function(){
    return view('umkm.pesananMasuk');
});

Route::get('/pesananUmkm', function(){
    return view('umkm.pesanan');
});


Route::put('/tarikSaldoDebit/{id}', [UserController::class, 'tarikSaldoKonsumen']);
Route::put('/tarikSaldoEmoney/{id}', [UserController::class, 'tarikSaldoKonsumen']);

Route::put('/tarikSaldoDebitUMKM/{id}', [UserController::class, 'tarikSaldoUMKM']);
Route::put('/tarikSaldoEmoneyUMKM/{id}', [UserController::class, 'tarikSaldoUMKM']);


Route::group(["prefix" => "umkm", "middleware" => "umkm"], function(){
    Route::get('/', [UserController::class, 'umkmHome'])->name("berandaumkm");
    Route::get('/dashboard',[ProdukController::class,'index'])->name("dashboardumkm");
    Route::get('/search', [ProdukController::class,'umkmsearch']);

    Route::get('/pesanan', [UmkmPesananController::class, 'umkmindex'])->name('pesanan');
    Route::get('/terima-pesanan/{Id}', [UmkmPesananController::class ,'umkmterimapesanan']);
    Route::get('/detailTransaksi/{IdTransaksi}', [UmkmPesananController::class, 'umkmshow']);
    Route::get('/detailTransaksi-2/{IdTransaksi}', [UmkmPesananController::class, 'umkmshow2']);
    Route::get('/detailTransaksi-3/{IdTransaksi}', [UmkmPesananController::class, 'umkmshow3']);
    Route::get('/detailTransaksi-4/{IdTransaksi}', [UmkmPesananController::class, 'umkmshow4']);
    Route::post('/tolak-pesanan/{IdTransaksi}', [UmkmPesananController::class, "umkmtolakpesanan"]);
    Route::get('/pesanan-disiapkan',[UmkmPesananController::class, 'umkmdisiapkan'])->name("pesanan-disiapkan");
    Route::get('/kirim-pesanan/{IdTransaksi}', [UmkmPesananController::class, 'umkmkirimpesanan']);
    Route::get('/pesanan-dikirimkan', [UmkmPesananController::class, 'umkmdikirimkan'])->name("pesanan-dikirimkan");
    Route::get('/pesanan-sampai/{IdTransaksi}', [UmkmPesananController::class, 'umkmpesanansampai']);
    Route::get('/pesanan-selesai', [UmkmPesananController::class, 'umkmpesananselesai'])->name("pesanan-selesai");
    Route::get('/pesanan-dibatalkan', [UmkmPesananController::class, 'umkmdibatalkan'])->name("pesanan-dibatalkan");

    Route::get('/chat/{IdPerson}', [ChatController::class,'index2'])->middleware('auth');
    Route::get('/profileToko', function(){
        return view('umkm.profileToko');
    });
    Route::get('/tambahProduk', function(){
        return view('umkm.tambahProduk');
    })->name("tambahProduk");

    Route::post('/tambahProduk',[ProdukController::class,'store']);
    Route::get('/editProduk/{IdProduk}', [ProdukController::class,'edit'])->name("editProduk");
    Route::put('/updateProduk',[ProdukController::class,'update']);
    Route::get('/editProfileToko',[LoginController::class,'editToko']);
    Route::put('/update',[LoginController::class,'updateToko']);
});




Route::group(["prefix" => "konsumen", "middleware" => "konsumen"], function(){
    // SESI KERANJANG
    Route::get('/listKeranjang', [AcaraController::class, 'index']);
    Route::post('/tambahAcara',[AcaraController::class,'store']);
    Route::get('/keranjang', [KeranjangController::class, 'index']);
    Route::get('/keranjang/{IdAcara}', [KeranjangController::class, 'detailKeranjang']);
    Route::put('/hapus-keranjang', [KeranjangController::class, 'hapuskeranjang']);
    Route::post('/addtocart',[KeranjangController::class, 'store']);

    // SESI EDIT KERANJANG
    Route::post('/deleteCart',[KeranjangController::class, 'destroy']);
    Route::post('/updateCart',[KeranjangController::class, 'update']);
    Route::post('/checkout', [KeranjangController::class, 'checkout']);
    Route::post('/bayar', [TransaksiController::class, 'store']);
    Route::get('/pembayaran/{IdTransaksi}', [TransaksiController::class, 'virtualaccount']);

    Route::get('/pesanan', [TransaksiController::class, 'index'])->middleware('auth')->name("pesanan");
    Route::get('/filter-pesanan-belum-bayar',[TransaksiController::class, 'filterpesananbelumbayar']);

    Route::get('/detailTransaksi/{IdTransaksi}', [TransaksiController::class, 'show']);
    Route::post('/bayarselesai',[TransaksiController::class, 'pembayaranselesai']);
    Route::get('/disiapkan', [TransaksiController::class, 'disiapkan'])->name("pesanan-disiapkan");
    Route::get('/filter-pesanan',[TransaksiController::class, 'filterpesanan']);

    Route::get('/dikirimkan', [TransaksiController::class, 'dikirimkan'])->name("pesanan-dikirimkan");
    Route::get('/filter-pesanan-dikirimkan',[TransaksiController::class, 'filterpesanandikirimkan']);

    Route::get('/diterima/{IdDetail}',[TransaksiController::class, 'diterima']);
    Route::get('/selesai', [TransaksiController::class, 'selesai'])->name("pesanan-selesai");
    Route::get('/filter-pesanan-selesai',[TransaksiController::class, 'filterpesananselesai']);
    Route::post('/rating', [TransaksiController::class, 'rating']);

    Route::get('/batalkan/{IdTransaksi}', [TransaksiController::class, 'batalkan']);
    Route::get('/dibatalkan', [TransaksiController::class, 'dibatalkan'])->name("pesanan-dibatalkan");
    Route::get('/chat/{IdPerson}', [ChatController::class,'index'])->middleware('auth');

    Route::get('/tariksaldo', [UserController::class, 'showsaldo']);
});

Route::post('/send-message/{IdPerson}', [ChatController::class,'sendChat']);

Route::get('/konsumen/detailproduk/{IdProduk}',[ProdukController::class, 'show'])->name('detailProduk');
Route::get('/konsumen/toko/{IdToko}',[UserController::class, 'detailToko']);
Route::get('/konsumen/toko/filter-produk',[ProdukController::class, 'filterToko']);
Route::get('/loadCartCount', [KeranjangController::class, 'CartCount']);

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackgoogle']);

// require __DIR__.'/auth.php';








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
})->middleware('guest');

Route::post('api/fetch-kota', [RegisterController::class, 'fetchKota']);

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'store']);
Route::post('/logout',[LoginController::class,'logout']);

Route::get('/form',[IndoRegionController::class,'form'])->name('form');
Route::post('api/fetch-kota', [IndoRegionController::class, 'fetchState']);
