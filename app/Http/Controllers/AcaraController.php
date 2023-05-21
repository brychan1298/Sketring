<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listAcara = [];
        $daftarAcara = Acara::select("Keranjang.*","Produk.*","Acara.Nama AS NamaAcara","Acara.IdAcara AS IdAcara")
                        ->leftJoin('Keranjang', function($join){
                        $join->on('Acara.IdAcara', '=', 'Keranjang.IdAcara');
                        })
                        ->leftJoin('Produk',function($joins){
                            $joins->on('Produk.IdProduk','=','Keranjang.IdProduk');
                        })
                        ->where('Acara.IdUser',Auth::User()->IdUser)
                        ->where('Acara.Show',1)
                        ->get();

        foreach($daftarAcara as $items){
            $listAcara[$items->NamaAcara][] = $items;
        }
        // dd($listAcara);
        return view("konsumen.ListKeranjang",compact('daftarAcara','listAcara'));
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
        ]);
        $validatedData['IdUser'] = Auth::User()->IdUser;

        Acara::create($validatedData);

        return redirect('/listKeranjang')->with("success","Jenis keranjang/acara berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Acara $acara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Acara $acara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acara $acara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acara $acara)
    {
        //
    }
}
