<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Acara;
use App\Models\Keranjang;
use App\Models\TransaksiDetail;
use App\Models\Produk;
use App\Models\User;
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
                                ->where("TransaksiDetail.Status",1)
                                ->get();
        // dd($Transaction);
        foreach($Transaction as $items){
            $ListTransaksi[$items->IdTransaksi][] = $items;
        }
        return view("konsumen.pesanan.pesanan", compact('Transaction','ListTransaksi'));
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
        $date = date('Y-m-d');
        $date = $request->TanggalPesanan;

        $ListKeranjang = Keranjang::whereIn("Keranjang.IdKeranjang",$request->listIdKeranjang)->get();
        $Transaksi = new Transaksi();
        $Transaksi->IdUser = Auth::User()->IdUser;
        $Transaksi->TanggalTransaksi = now()->format('Y-m-d');
        $Transaksi->TanggalPesanan = $date;
        $Transaksi->SudahBayar = 0;
        $Transaksi->AlamatKirim = $request->AlamatKirim;
        $Transaksi->waktuPesanan = $request->waktuPesanan;
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
        $DataTransaksi = Transaksi::find($IdTransaksi);
        $DataTransaksiDetail = TransaksiDetail::where("IdTransaksi",$IdTransaksi)->get();
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
        $TanggalTemp = $TanggalPesanan;
        $TanggalTemp = strtotime($TanggalPesanan);
        $TanggalBesok = $TanggalTemp + (24 * 60 * 60);
        $TanggalBesokFinal = strftime('%e %B %Y', $TanggalBesok);
        foreach($ListProduk as $items){
            $ListProduks[$items->NamaAcara][] = $items;
        }

        $grossAmount = 0;
        foreach($DataTransaksiDetail as $Transaksi){
            $grossAmount += ($Transaksi->Produk->Harga * $Transaksi->Qty);
        }
        $grossAmount += 30000;

        \Midtrans\Config::$serverKey = "SB-Mid-server-X9fofavHBv3Q41d6DCD6r4Xr";
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $IdTransaksi,
                'gross_amount' => $grossAmount,
            ),
            'customer_details' => array(
                'first_name' => $DataTransaksi->User->Nama,
                'email' => $DataTransaksi->User->email,
                'phone' => $DataTransaksi->User->Nohp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);

        return view("konsumen.virtualAccount", compact('IdTransaksi','snapToken',  'ListProduks', 'TanggalBesokFinal'));
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

        return view("konsumen.pesanan.detailPesanan", compact('ListProduks','TanggalPesanan','IdTransaksi'));
    }

    public function pembayaranselesai(Request $request){
        $IdTransaksi = $request->IdTransaksi;

        $Transaksi = Transaksi::find($IdTransaksi);
        $Transaksi->SudahBayar = 1;
        $Transaksi->save();

        $TransaksiDetail = TransaksiDetail::where("IdTransaksi", "=", $IdTransaksi);
        TransaksiDetail::where("IdTransaksi","=",$IdTransaksi)->update(["status" => "2"]);
        return redirect("/konsumen/pesanan");
    }

    public function disiapkan(Request $request){
        $ListAcara = Acara::where("IdUser",Auth::User()->IdUser)->get();
        $ListTransaksi = [];

        $Transaksi = TransaksiDetail::
                    selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*")
                    ->join("Transaksi","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                    ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                    ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                    ->where("Transaksi.IdUser","=",Auth::User()->IdUser)
                    ->where("Transaksi.SudahBayar",1)
                    ->where(function ($query){
                        $query->where("TransaksiDetail.Status",2)
                                ->orWhere("TransaksiDetail.Status",3);
                    })
                    ->get();

        foreach($Transaksi as $items){
            $ListTransaksi[$items->IdTransaksi][] = $items;
        }

        return view("konsumen.pesanan.pesanan-disiapkan",compact('ListTransaksi','ListAcara'));
    }

    public function dikirimkan(Request $request){
        $ListAcara = Acara::where("IdUser",Auth::User()->IdUser)->get();
        $ListTransaksi = [];

        $Transaksi = TransaksiDetail::
                    selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*, Produk.IdUser As IdToko")
                    ->join("Transaksi","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                    ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                    ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                    ->where("Transaksi.IdUser","=",Auth::User()->IdUser)
                    ->where("Transaksi.SudahBayar",1)
                    ->where(function ($query){
                        $query->where("TransaksiDetail.Status",4);
                        $query->orWhere("TransaksiDetail.Status",5);
                    })
                    ->get();

        $ListTransaksi = [];

        foreach($Transaksi as $items){
            $ListTransaksi[$items->IdTransaksi][] = $items;
        }

        return view("konsumen.pesanan.pesanan-dikirimkan",compact('ListTransaksi','ListAcara'));
    }

    public function diterima($IdDetail){
        $TransaksiDetail = TransaksiDetail::
            where("TransaksiDetail.Id",$IdDetail)
            ->update(
            ["Status"=>6]
        );

        $DataProduk = Produk::join("TransaksiDetail","TransaksiDetail.IdProduk","=","Produk.IdProduk")
                        ->where("TransaksiDetail.Id",$IdDetail)
                        ->first();

        $User = User::where("IdUser",$DataProduk->IdUser)->first();
        $saldo = $User->Saldo;
        $newSaldo = $saldo + ($DataProduk->Qty * $DataProduk->Harga);
        User::where("IdUser",$DataProduk->IdUser)
            ->update([
                'Saldo' => $newSaldo
            ]);
        // dd($DataProduk);

        return redirect('konsumen/dikirimkan')->with("selesai", "Anda telah menerima pesanan");
    }

    public function selesai(){
        $ListAcara = Acara::where("IdUser",Auth::User()->IdUser)->get();
        $ListTransaksi = [];

        $Transaksi = TransaksiDetail::
                    selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*, Produk.IdUser As IdToko")
                    ->join("Transaksi","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                    ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                    ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                    ->where("Transaksi.IdUser","=",Auth::User()->IdUser)
                    ->where("Transaksi.SudahBayar",1)
                    ->where(function ($query){
                        $query->where("TransaksiDetail.Status",6);
                        // $query->orWhere("TransaksiDetail.Status",5);
                    })
                    ->get();

                    $ListTransaksi = [];

        foreach($Transaksi as $items){
            $ListTransaksi[$items->IdTransaksi][] = $items;
        }

        return view("konsumen.pesanan.pesanan-selesai",compact('ListTransaksi','ListAcara'));
    }

    public function batalkan($IdTransaksi){
        $TransaksiDetail = TransaksiDetail::
            where("TransaksiDetail.IdTransaksi",$IdTransaksi)
            ->update(
            ["Status"=>-1]
        );

        return redirect('/konsumen/pesanan')->with("batalkan", "Anda telah membatalkan sebuah pesanan");
    }

    public function dibatalkan(){
        $ListAcara = Acara::where("IdUser",Auth::User()->IdUser)->get();
        $ListTransaksi = [];

        $Transaksi = TransaksiDetail::
                    selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*, Produk.IdUser As IdToko")
                    ->join("Transaksi","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                    ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                    ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                    ->where("Transaksi.IdUser","=",Auth::User()->IdUser)
                    // ->where("Transaksi.SudahBayar",1)
                    ->where(function ($query){
                        $query->where("TransaksiDetail.Status",-1);
                        // $query->orWhere("TransaksiDetail.Status",5);
                    })
                    ->get();

                    $ListTransaksi = [];

        foreach($Transaksi as $items){
            $ListTransaksi[$items->IdTransaksi][] = $items;
        }

        return view("konsumen.pesanan.pesanan-batal",compact('ListTransaksi','ListAcara'));
    }

    public function filterpesanan(Request $request){
        $ListAcara = Acara::where("IdUser",Auth::User()->IdUser)->get();
        $IdAcara = $request->input('IdAcara');

        $ListTransaksi = [];

        $Transaksi = TransaksiDetail::
                    selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*")
                    ->join("Transaksi","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                    ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                    ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                    ->where("Transaksi.IdUser","=",Auth::User()->IdUser)
                    ->where("Transaksi.SudahBayar",1)
                    ->where("TransaksiDetail.IdAcara",$IdAcara)
                    ->where(function ($query){
                        $query->where("TransaksiDetail.Status",2)
                                ->orWhere("TransaksiDetail.Status",3);
                    })
                    ->get();

        if($IdAcara == 0){
            $Transaksi = TransaksiDetail::
                            selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*, Produk.IdUser As IdToko, Transaksi.IdTransaksi As IdTransaksi")
                            ->join("Transaksi","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                            ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                            ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                            ->where("Transaksi.IdUser","=",Auth::User()->IdUser)
                            ->where("Transaksi.SudahBayar",1)
                            ->where(function ($query){
                                $query->where("TransaksiDetail.Status",2)
                                        ->orWhere("TransaksiDetail.Status",3);
                            })
                            ->get();
        }

        foreach($Transaksi as $items){
            $ListTransaksi[$items->IdTransaksi][] = $items;
        }

        $view = view("konsumen.pesanan.datapesanandisiapkan",['ListTransaksi' => $ListTransaksi]);
        $html = $view->render();
        return $html;
    }

    public function filterpesanandikirimkan(Request $request){
        $ListAcara = Acara::where("IdUser",Auth::User()->IdUser)->get();
        $IdAcara = $request->input('IdAcara');

        $ListTransaksi = [];

        $Transaksi = TransaksiDetail::
                    selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*")
                    ->join("Transaksi","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                    ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                    ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                    ->where("Transaksi.IdUser","=",Auth::User()->IdUser)
                    ->where("Transaksi.SudahBayar",1)
                    ->where("TransaksiDetail.IdAcara",$IdAcara)
                    ->where(function ($query){
                        $query->where("TransaksiDetail.Status",4);
                        $query->orWhere("TransaksiDetail.Status",5);
                    })
                    ->get();

        if($IdAcara == 0){
            $Transaksi = TransaksiDetail::
                        selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*, Produk.IdUser As IdToko")
                        ->join("Transaksi","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                        ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                        ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                        ->where("Transaksi.IdUser","=",Auth::User()->IdUser)
                        ->where("Transaksi.SudahBayar",1)
                        ->where(function ($query){
                            $query->where("TransaksiDetail.Status",4);
                            $query->orWhere("TransaksiDetail.Status",5);
                        })
                        ->get();
        }

        foreach($Transaksi as $items){
            $ListTransaksi[$items->IdTransaksi][] = $items;
        }

        $view = view("konsumen.pesanan.datapesanandikirimkan",['ListTransaksi' => $ListTransaksi]);
        $html = $view->render();
        return $html;
    }

    public function filterpesananselesai(Request $request){
        $ListAcara = Acara::where("IdUser",Auth::User()->IdUser)->get();
        $IdAcara = $request->input('IdAcara');

        $ListTransaksi = [];

        $Transaksi = TransaksiDetail::
                    selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*")
                    ->join("Transaksi","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                    ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                    ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                    ->where("Transaksi.IdUser","=",Auth::User()->IdUser)
                    ->where("Transaksi.SudahBayar",1)
                    ->where("TransaksiDetail.IdAcara",$IdAcara)
                    ->where(function ($query){
                        $query->where("TransaksiDetail.Status",6);
                    })
                    ->get();

        if($IdAcara == 0){
            $Transaksi = TransaksiDetail::
                        selectRaw("TransaksiDetail.*,Transaksi.*, Acara.Nama as NamaAcara, Produk.*, Produk.IdUser As IdToko")
                        ->join("Transaksi","TransaksiDetail.IdTransaksi","=","Transaksi.IdTransaksi")
                        ->join("Produk","Produk.IdProduk","=","TransaksiDetail.IdProduk")
                        ->join("Acara","Acara.IdAcara","=","TransaksiDetail.IdAcara")
                        ->where("Transaksi.IdUser","=",Auth::User()->IdUser)
                        ->where("Transaksi.SudahBayar",1)
                        ->where(function ($query){
                            $query->where("TransaksiDetail.Status",6);
                            // $query->orWhere("TransaksiDetail.Status",5);
                        })
                        ->get();

                        $ListTransaksi = [];
        }

        foreach($Transaksi as $items){
            $ListTransaksi[$items->IdTransaksi][] = $items;
        }

        $view = view("konsumen.pesanan.datapesananselesai",['ListTransaksi' => $ListTransaksi]);
        $html = $view->render();
        return $html;
    }

    // public function rating(Request $request, $IdProduk, $IdRating){
    //     $produk = Produk::findOrFail($IdProduk);
    //     $jumlahRatingBaru = $produk->JumlahRating + 1;

    //     $ratingBaru = ($produk->Rating * $produk->JumlahRating + $rating) / $jumlahRatingBaru;

    //     $produk->Rating = $ratingBaru;
    //     $produk->JumlahRating = $jumlahRatingBaru;
    //     $produk->save();

    //     return redirect();
    // }

    public function rating(Request $request){
        $rating = intval($request->input('rate'));
        $transaksiId = $request->transaksiId;
        $transaksi = TransaksiDetail::find($transaksiId);

        $produk = Produk::find($transaksi->IdProduk);
        // dd($produk->IdProduk);

        $jumlahRatingBaru = $produk->JumlahRating + 1;
        $ratingBaru = ($produk->Rating * $produk->JumlahRating + $rating) / $jumlahRatingBaru;

        $produk->Rating = $ratingBaru;
        $produk->JumlahRating = $jumlahRatingBaru;
        // $produk = [
        //     'Rating' => $ratingBaru,
        //     'JumlahRating' => $jumlahRatingBaru
        // ];

        $produk->update();

        $transaksi->statusRated = 1;
        // $transaksi = [
        //     'statusRated' => 1
        // ];

        $transaksi->update();

        return response()->json(['success' => true]);
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
