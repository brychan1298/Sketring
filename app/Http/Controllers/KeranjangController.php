<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function CartCount(){
        $listAcara = Acara::select('IdAcara')->where('IdUser',Auth::User()->IdUser)->get();
        $cartCount = 0;
        foreach($listAcara as $Acara){
            $cartCount += Keranjang::where('IdAcara',$Acara->IdAcara)->count();
        }
        return response()->json(['count' => $cartCount]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $IdProduk = $request->input('IdProduk');
        $Qty = $request->input('Qty');
        $IdAcara = $request->input('IdAcara');

        $produks = Produk::findOrFail($IdProduk);


        if(Auth::check()){
            if($IdAcara == 0){
                return response()->json(['status' => 'Tolong pilih keranjang terlebih dahulu']);
            }
            if($Qty == 0){
                return response()->json(['status' => 'Tolong masukkan jumlah barang']);
            }
            if($Qty)
            if(Keranjang::where('IdAcara',$IdAcara)->where('IdProduk',$IdProduk)->exists()){
                return response()->json(['status' => 'Barang ini telah ada di keranjang anda']);
            }
            $Keranjang = new Keranjang();
            $Keranjang->IdAcara = $IdAcara;
            $Keranjang->IdProduk = $IdProduk;
            $Keranjang->Qty = $Qty;
            $Keranjang->save();

            return response()->json(['status' => 'Item berhasil ditambahkan ke keranjang']);
        }else{
            return response()->json(['status' => 'Silahkan login terlebih dahulu']);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keranjang $keranjang)
    {
        //
    }
}
