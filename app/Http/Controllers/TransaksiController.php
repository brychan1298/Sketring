<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Acara;
use App\Models\Keranjang;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $Transaction = Transaksi::where("IdUser",Auth::User()->IdUser)->where("SudahBayar",0);

        $ListTransaksi = [];
        $Transaction = Transaksi::selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*")
                                ->join("TransaksiDetail","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                                ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                                ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                                ->where("Transaksi.IdUser",Auth::User()->IdUser)
                                ->where("Transaksi.SudahBayar",0)
                                ->get();
        // dd($Transaction);
        foreach($Transaction as $items){
            $ListTransaksi[$items->IdTransaksi][] = $items;
        }
        return view("konsumen.pesanan", compact('Transaction','ListTransaksi'));
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
        // dd($request->listIdKeranjang);

        $date = date('Y-m-d');
        $date = $request->TanggalPesanan;
        // dd($request->AlamatKirim);
        // if(!$date){
        //     return redirect("/konsumen/checkout")->withInput();
        // }
        // dd($date);
        $ListKeranjang = Keranjang::whereIn("Keranjang.IdKeranjang",$request->listIdKeranjang)->get();
        $Transaksi = new Transaksi();
        $Transaksi->IdUser = Auth::User()->IdUser;
        $Transaksi->TanggalTransaksi = now()->format('Y-m-d');
        $Transaksi->TanggalPesanan = $date;
        $Transaksi->SudahBayar = 0;
        $Transaksi->AlamatKirim = $request->AlamatKirim;
        $Transaksi->save();

        $LatestTransaksi = Transaksi::latest()->first();
        $IdTransaksi = $LatestTransaksi->IdTransaksi;

        foreach($ListKeranjang as $Items){
            $TransaksiDetail = new TransaksiDetail();
            $TransaksiDetail->IdTransaksi = $IdTransaksi;
            $TransaksiDetail->IdProduk = $Items->IdProduk;
            $TransaksiDetail->IdAcara = $Items->IdAcara;
            $TransaksiDetail->Qty = $Items->Qty;
            $TransaksiDetail->Status = 1;
            $TransaksiDetail->save();

            $KeranjangItem = Keranjang::where('IdKeranjang',$Items->IdKeranjang)->first();
            $KeranjangItem->delete();
        }

        return redirect("/konsumen/pembayaran/".$IdTransaksi);
    }

    public function virtualaccount($IdTransaksi){

        return view("konsumen.virtualAccount");
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi, $IdTransaksi)
    {
        $ListProduks = [];
        $ListProduk = Acara::selectRaw("Acara.Nama AS NamaAcara, Transaksi.*, Produk.*, TransaksiDetail.*")
                                ->join("TransaksiDetail","TransaksiDetail.IdAcara","=","Acara.IdAcara")
                                ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                                ->join("Transaksi","Transaksi.IdTransaksi","=","TransaksiDetail.IdTransaksi")
                                ->where("Transaksi.IdTransaksi",$IdTransaksi)->get();
        $tanggal = Transaksi::where("IdTransaksi",$IdTransaksi)->first()->TanggalPesanan;
        $TanggalPesanan = date_create($tanggal);
        setlocale(LC_ALL, 'id_ID.utf8');
        $TanggalPesanan = strftime('%e %B %Y', $TanggalPesanan->getTimestamp());
        foreach($ListProduk as $items){
            $ListProduks[$items->NamaAcara][] = $items;
        }

        return view("konsumen.detailPesanan", compact('ListProduks','TanggalPesanan','IdTransaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
