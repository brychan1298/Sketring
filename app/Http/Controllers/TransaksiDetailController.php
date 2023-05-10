<?php

namespace App\Http\Controllers;

use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function umkmterimapesanan($Id){
        $TransaksiDetail = TransaksiDetail::
            join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
            ->where("TransaksiDetail.IdTransaksi",$Id)
            ->where("Produk.IdUser",Auth::User()->IdUser)
            ->update(
            ["status"=>3]
        );
        // $TransaksiDetail->Status = 3;
        // $TransaksiDetail->save();

        return redirect("/umkm/pesanan")->with("Success","Anda telah menerima pesanan ini");
    }

    public function umkmtolakpesanan($IdTransaksi){
        $TransaksiDetail = TransaksiDetail::
            join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
            ->where("TransaksiDetail.IdTransaksi",$IdTransaksi)
            ->where("Produk.IdUser",Auth::User()->IdUser)
            ->update(
            ["status"=>-1]
        );
        // $TransaksiDetail->Status = 3;
        // $TransaksiDetail->save();

        return redirect("/umkm/pesanan")->with("Delete","Anda telah menolak pesanan");
    }
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiDetail $transaksiDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiDetail $transaksiDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransaksiDetail $transaksiDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiDetail $transaksiDetail)
    {
        //
    }
}
