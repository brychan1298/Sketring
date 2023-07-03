<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $listAcara = Keranjang::select("*")->join("Acara","Keranjang.IdAcara","=","Acara.IdAcara")
                                // ->join("Produk","Keranjang.IdProduk","=","Produk.IdProduk")
                                // ->where("Acara.IdUser","=",Auth::User()->IdUser)
                                // // ->groupBy("Acara.IdAcara")
                                // ->get();
        $listAcara = [];

        $Acara = Acara::selectRaw("Acara.Nama AS NamaAcara, Keranjang.*, Produk.*, Acara.IdAcara AS IdAcara")
                                ->join("Keranjang","Keranjang.IdAcara","=","Acara.IdAcara")
                                ->join("Produk","Produk.IdProduk","=","Keranjang.IdProduk")
                                ->where("Acara.IdUser",Auth::User()->IdUser)
                                ->where("Acara.Show",1)
                                ->get();
        // dd($Acara);
        foreach($Acara as $items){
            $listAcara[$items->NamaAcara][] = $items;
        }
        $namaAcara = "Semua Produk";
        // dd($listAcara);
        return view("konsumen.keranjang",compact('listAcara','namaAcara'));
    }

    public function detailKeranjang($IdAcara){
        $listAcara = [];

        $Acara = Acara::selectRaw("Acara.Nama AS NamaAcara, Keranjang.*, Produk.*")
                                ->join("Keranjang","Keranjang.IdAcara","=","Acara.IdAcara")
                                ->join("Produk","Produk.IdProduk","=","Keranjang.IdProduk")
                                ->where("Acara.IdUser",Auth::User()->IdUser)
                                ->where("Acara.IdAcara",$IdAcara)->get();
        // dd($Acara);
        $namaAcara = "";
        foreach($Acara as $items){
            $listAcara[$items->NamaAcara][] = $items;
            $namaAcara = $items->NamaAcara;
        }

        // dd($listAcara);
        return view("konsumen.keranjang",compact('listAcara','namaAcara'));
    }

    public function hapuskeranjang(Request $request){
        $IdAcara = $request->IdAcara;

        $Acara = Acara::find($IdAcara);
        $Acara->Show = 0;
        $Acara->save();

        return redirect("/konsumen/listKeranjang");
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

            return response()->json(['status' => 'Item berhasil ditambahkan ke keranjang','success'=>'success']);
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
        $data = $request->all();
        Keranjang::where('IdKeranjang', $data['IdKeranjang'])->update(['Qty'=>$data['Qty']]);
        return response()->json(['newQty'=>$data['Qty']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keranjang $keranjang, Request $request)
    {
        // return response()->json(['status'=>'Product telah dihapus dari keranjang anda']);
        $IdKeranjang = $request->input('IdKeranjang');
        $KeranjangItem = Keranjang::where('IdKeranjang',$IdKeranjang)->first();
        $KeranjangItem->delete();
        return response()->json(['status'=>'Product telah dihapus dari keranjang anda']);
    }

    public function checkout(Request $request){
        // dd($request->IdKeranjangList);
        $listAcara = [];

        $Acara = Acara::selectRaw("Acara.Nama AS NamaAcara, Keranjang.*, Produk.*")
                                ->join("Keranjang","Keranjang.IdAcara","=","Acara.IdAcara")
                                ->join("Produk","Produk.IdProduk","=","Keranjang.IdProduk")
                                ->whereIn("Keranjang.IdKeranjang",$request->IdKeranjangList)->get();
        // dd($Acara);
        foreach($Acara as $items){
            $listAcara[$items->NamaAcara][] = $items;
        }
        $namaAcara = $request->NamaAcara;
        // dd($listAcara);
        return view("konsumen.pembayaran",compact('listAcara','namaAcara'));
    }
}
