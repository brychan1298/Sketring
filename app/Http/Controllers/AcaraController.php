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
        $daftarAcara = Acara::where('IdUser',Auth::User()->IdUser)->get();
        return view("konsumen.ListKeranjang",compact('daftarAcara'));
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
