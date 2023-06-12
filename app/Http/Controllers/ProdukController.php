<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Acara;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::Where('Iduser',Auth::User()->IdUser)->get();

        // dd($produks);
        return view("umkm.dashboard",compact('produks'));
    }

    public function konsumenIndex(Request $request)
    {
        if(Auth::check()){
            $produks = Produk::select('Produk.*')->join('users','Produk.IdUser','=','users.IdUser')
                        ->join('regencies','users.IdKota','=','regencies.id')
                        ->where('users.IdKota','=',Auth::User()->IdKota);
            // $produks = $produks->where('IdKota','=',Auth::User()->IdKota);
            // dd($produks);
        }else{
            $produks = Produk::latest();
        }



        $produks = $produks->paginate(10)->withQueryString();

        return view("konsumen.cari",compact('produks'));
    }

    public function konsumenSearch(Request $request){
        if(Auth::check()){
            $produks = Produk::select('Produk.*')->join('users','Produk.IdUser','=','users.IdUser')
                        ->join('regencies','users.IdKota','=','regencies.id')
                        ->where('users.IdKota','=',Auth::User()->IdKota);
        }else{
            $produks = Produk::latest();
        }
        if(request('search') != ""){
            $produks = $produks->where('Produk.Nama','like','%'.request('search').'%');
        }
        $produks = $produks->paginate(10)->withQueryString();
        $view = view("konsumen.data-cari",['produks' => $produks]);
        $html = $view->render();
        return $html;
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
        $validatedData = $request->validate([
            'Nama' => 'required|max:255',
            'FotoProduk' => 'image|file|max:1024',
            'Deskripsi' => 'required',
            'Harga' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'MinOrder' => 'required|numeric',
            'MaxOrder' => 'required|numeric',
            'MinimalWaktuPO' => 'required|numeric',
        ]);

        if($request->file('FotoProduk')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['FotoProduk'] = $request->file('FotoProduk')->store();
        }

        $validatedData['IdUser'] = Auth::User()->IdUser;

        Produk::create($validatedData);

        return redirect('/umkm/dashboard')->with('success', 'Produk baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk,$IdProduk)
    {
        $keranjang = [];
        $detailProduk = Produk::find($IdProduk);
        if(Auth::check()){
            $keranjang = Acara::where("IdUser",Auth::User()->IdUser)->get();
        }
        return view('konsumen.detailProduk',compact('detailProduk','keranjang'));
    }

    public function filterProduk(Request $request){
        $TipeHarga = $request->input('TipeHarga');
        if(Auth::check()){
            $produks = Produk::select('Produk.*')->join('users','Produk.IdUser','=','users.IdUser')
                        ->join('regencies','users.IdKota','=','regencies.id')
                        ->where('users.IdKota','=',Auth::User()->IdKota)
                        ->orderBy('Produk.Harga',$TipeHarga);
        }else{
            $produks = Produk::latest()->orderBy('Produk.Harga',$TipeHarga);
        }

        $produks = $produks->paginate(10)->withQueryString();
        $view = view("konsumen.data-cari",['produks' => $produks]);
        $html = $view->render();
        return $html;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk,$IdProduk)
    {
        $produk = Produk::find($IdProduk);
        return view('umkm.editProduk',compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedUpdate = [
            'Nama' => 'required|max:255',
            'FotoProduk' => 'image|file|max:1024',
            'Deskripsi' => 'required',
            'Harga' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'MinOrder' => 'required|numeric',
            'MaxOrder' => 'required|numeric',
            'MinimalWaktuPO' => 'required|numeric',
        ];

        $validatedData = $request->validate($validatedUpdate);

        if($request->file('FotoProduk')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['FotoProduk'] = $request->file('FotoProduk')->store();
        }

        $idProduk = request('IdProduk');

        Produk::where('IdProduk',request('IdProduk'))->update($validatedData);
        // return redirect('/dashboard');
        return redirect('/umkm/editProduk/'.$idProduk)->with('success','Produk telah berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
