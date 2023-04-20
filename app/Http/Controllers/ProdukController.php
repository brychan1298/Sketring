<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        return redirect('/dashboard')->with('success', 'Produk baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
