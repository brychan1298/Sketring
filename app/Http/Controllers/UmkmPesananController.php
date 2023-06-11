<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use App\Models\TransaksiDetail;

use Illuminate\Http\Request;

class UmkmPesananController extends Controller
{
    public function umkmindex(){
        $ListTransaksi = [];

        $Transaction = Transaksi::selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*")
                                ->join("TransaksiDetail","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                                ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                                ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                                ->where("Produk.IdUser",Auth::User()->IdUser)
                                ->where("TransaksiDetail.Status",2)
                                ->get();

        foreach($Transaction as $items){
            $ListTransaksi[$items->IdTransaksi][] = $items;
        }
        return view("umkm.pesanan.pesanan", compact("Transaction","ListTransaksi"));
    }

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

    public function umkmshow($IdTransaksi){
        $ListProduks = Transaksi::selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*")
                                ->join("TransaksiDetail","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                                ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                                ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                                ->where("Produk.IdUser",Auth::User()->IdUser)
                                ->where(function ($query){
                                    $query->where("TransaksiDetail.Status",2);
                                    $query->orWhere("TransaksiDetail.Status",3);
                                })
                                ->where("Transaksi.IdTransaksi",$IdTransaksi)
                                ->get();
        $tanggal = Transaksi::where("IdTransaksi",$IdTransaksi)->first()->TanggalPesanan;
        $DataTransaksiUser = Transaksi::where("IdTransaksi",$IdTransaksi)->first();
        $TanggalPesanan = date_create($tanggal);
        setlocale(LC_ALL, 'id_ID.utf8');
        $TanggalPesanan = strftime('%e %B %Y', $TanggalPesanan->getTimestamp());
        $statusView = "sudahbayar";
        return view("umkm.pesanan.detailPesanan", compact("ListProduks","TanggalPesanan","DataTransaksiUser","IdTransaksi","statusView"));
    }
    public function umkmshow2($IdTransaksi){
        $ListProduks = Transaksi::selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*")
                                ->join("TransaksiDetail","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                                ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                                ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                                ->where("Produk.IdUser",Auth::User()->IdUser)
                                ->where(function ($query){
                                    $query->where("TransaksiDetail.Status",2);
                                    $query->orWhere("TransaksiDetail.Status",3);
                                })
                                ->where("Transaksi.IdTransaksi",$IdTransaksi)
                                ->get();
        $tanggal = Transaksi::where("IdTransaksi",$IdTransaksi)->first()->TanggalPesanan;
        $DataTransaksiUser = Transaksi::where("IdTransaksi",$IdTransaksi)->first();
        $TanggalPesanan = date_create($tanggal);
        setlocale(LC_ALL, 'id_ID.utf8');
        $TanggalPesanan = strftime('%e %B %Y', $TanggalPesanan->getTimestamp());
        $statusView = "disiapkan";
        return view("umkm.pesanan.detailPesanan", compact("ListProduks","TanggalPesanan","DataTransaksiUser","IdTransaksi","statusView"));
    }

    public function umkmshow3($IdTransaksi){
        $ListProduks = Transaksi::selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*")
                                ->join("TransaksiDetail","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                                ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                                ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                                ->where("Produk.IdUser",Auth::User()->IdUser)
                                ->where(function ($query){
                                    $query->where("TransaksiDetail.Status",6);
                                })
                                ->where("Transaksi.IdTransaksi",$IdTransaksi)
                                ->get();
        $tanggal = Transaksi::where("IdTransaksi",$IdTransaksi)->first()->TanggalPesanan;
        $DataTransaksiUser = Transaksi::where("IdTransaksi",$IdTransaksi)->first();
        $TanggalPesanan = date_create($tanggal);
        setlocale(LC_ALL, 'id_ID.utf8');
        $TanggalPesanan = strftime('%e %B %Y', $TanggalPesanan->getTimestamp());
        $statusView = "selesai";
        return view("umkm.pesanan.detailPesanan", compact("ListProduks","TanggalPesanan","DataTransaksiUser","IdTransaksi","statusView"));
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

    public function umkmdisiapkan(){
        $ListTransaksi = [];
        $Transaction = TransaksiDetail::
                    selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*")
                    ->join("Transaksi","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                    ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                    ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                    ->where("Produk.IdUser","=",Auth::User()->IdUser)
                    ->where("Transaksi.SudahBayar",1)
                    ->where("TransaksiDetail.Status","3")
                    ->get();

        foreach($Transaction as $items){
            $ListTransaksi[$items->IdTransaksi][] = $items;
        }
        // dd($ListTransaksi);
        return view("umkm.pesanan.pesanan-disiapkan",compact('ListTransaksi'));
    }

    public function umkmkirimpesanan($IdTransaksi){
        $TransaksiDetail = TransaksiDetail::
            join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
            ->where("TransaksiDetail.IdTransaksi",$IdTransaksi)
            ->where("Produk.IdUser",Auth::User()->IdUser)
            ->update(
            ["status"=>4]
        );

        return redirect('umkm/pesanan-disiapkan')->with("delivered", "Konsumen akan diberitahukan untuk menerima pesanan ini");
    }

    public function umkmdikirimkan(){
        $ListTransaksi = [];
        $Transaction = TransaksiDetail::
                    selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*, Transaksi.IdUser as IdKonsumen")
                    ->join("Transaksi","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                    ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                    ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                    ->where("Produk.IdUser","=",Auth::User()->IdUser)
                    ->where("Transaksi.SudahBayar",1)
                    ->where(function ($query){
                        $query->where("TransaksiDetail.Status",4);
                        $query->orWhere("TransaksiDetail.Status",5);
                    })
                    ->get();

        foreach($Transaction as $items){
            $ListTransaksi[$items->IdTransaksi][] = $items;
        }
        // dd($ListTransaksi);
        return view("umkm.pesanan.pesanan-dikirimkan",compact('ListTransaksi'));
    }

    public function umkmpesanansampai($IdTransaksi){
        $TransaksiDetail = TransaksiDetail::
            join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
            ->where("TransaksiDetail.IdTransaksi",$IdTransaksi)
            ->where("Produk.IdUser",Auth::User()->IdUser)
            ->update(
            ["status"=>5]
        );

        return redirect('umkm/pesanan-dikirimkan')->with("sampai", "Silahkan tunggu hingga konsumen menyelesaikan pesanan!!");
    }

    public function umkmpesananselesai(){
        $ListTransaksi = [];
        $Transaction = TransaksiDetail::
                    selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*, Transaksi.IdUser as IdKonsumen")
                    ->join("Transaksi","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                    ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                    ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                    ->where("Produk.IdUser","=",Auth::User()->IdUser)
                    ->where("Transaksi.SudahBayar",1)
                    ->where(function ($query){
                        $query->where("TransaksiDetail.Status",6);
                        // $query->orWhere("TransaksiDetail.Status",5);
                    })
                    ->get();

        foreach($Transaction as $items){
            $ListTransaksi[$items->IdTransaksi][] = $items;
        }
        // dd($ListTransaksi);
        return view("umkm.pesanan.pesanan-selesai",compact('ListTransaksi'));
    }

    public function umkmdibatalkan(){
        $ListTransaksi = [];
        $Transaction = TransaksiDetail::
                    selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*, Transaksi.IdUser as IdKonsumen")
                    ->join("Transaksi","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                    ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                    ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                    ->where("Produk.IdUser","=",Auth::User()->IdUser)
                    // ->where("Transaksi.SudahBayar",1)
                    ->where(function ($query){
                        $query->where("TransaksiDetail.Status",-1);
                        // $query->orWhere("TransaksiDetail.Status",5);
                    })
                    ->get();

        foreach($Transaction as $items){
            $ListTransaksi[$items->IdTransaksi][] = $items;
        }
        // dd($ListTransaksi);
        return view("umkm.pesanan.pesanan-batal",compact('ListTransaksi'));
    }
}
