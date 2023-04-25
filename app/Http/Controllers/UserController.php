<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;

class UserController extends Controller
{
    public function detailToko($IdToko){
        $detailToko = User::findOrFail($IdToko);
        $listProduks = Produk::where('IdUser',$IdToko)->get();
        return view("konsumen.toko",compact('detailToko','listProduks'));
    }
}
