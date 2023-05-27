<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home(){
        $produk = Produk::select("Produk.*");
        if(Auth::check()){
            $produk = $produk->join('users','Produk.IdUser','=','users.IdUser')
                        ->join('regencies','users.IdKota','=','regencies.id')
                        ->where('users.IdKota','=',Auth::User()->IdKota);
        }
        $produk = $produk->latest()->take(2)->get();
        // dd($produk);
        return view('konsumen.beranda', compact('produk'));
    }


    public function detailToko($IdToko){
        $detailToko = User::findOrFail($IdToko);
        $listProduks = Produk::where('IdUser',$IdToko)->get();
        return view("konsumen.toko",compact('detailToko','listProduks'));
    }

    public function umkmHome(){
        $ProdukUMKM = Produk::where('IdUser',Auth::User()->IdUser)->take(3)->get();
        return view("umkm.beranda",compact("ProdukUMKM"));
    }

    public function showsaldo(){
        return view("konsumen.saldo");
    }

    public function tarikSaldoKonsumen(request $request, User $user, $IdUser){
        $user = User::find($IdUser);
        $input = $request->nominal;
        $user->Saldo = $user->Saldo - $input;
        $user->save();

        return redirect('/tarikSaldo');
    }

    public function tarikSaldoUMKM(request $request, User $user, $IdUser){
        $user = User::find($IdUser);
        $input = $request->nominal;
        $user->Saldo = $user->Saldo - $input;
        $user->save();

        return redirect('/tarikSaldoUMKM');
    }
}
