<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
{
    // public function home(){
    //     $produk = Produk::select("Produk.*");
    //     if(Auth::check()){
    //         $produk = $produk->join('users','Produk.IdUser','=','users.IdUser')
    //                     ->join('regencies','users.IdKota','=','regencies.id')
    //                     ->where('users.IdKota','=',Auth::User()->IdKota);
    //     }
    //     $produk = $produk->latest()->take(2)->get();
    //     // dd($produk);
    //     return view('konsumen.beranda', compact('produk'));
    // }
    public function home(){
        $produk = Produk::select("Produk.*");

        $lastChatRaw = "";
        $unread = "";

        if(Auth::check()){
            $produk = $produk->join('users','Produk.IdUser','=','users.IdUser')
                        ->join('regencies','users.IdKota','=','regencies.id')
                        ->where('users.IdKota','=',Auth::User()->IdKota);
                        // dd($produk);

            $myId = Auth::User()->IdUser;

            $allID = DB::select("SELECT DISTINCT users.IdUser
            FROM users
            JOIN chat ON (users.IdUser = chat.IdSender AND chat.IdReceiver = '$myId')
                        OR (users.IdUser = chat.IdReceiver AND chat.IdSender = '$myId')");


            $allID = array_map(function($item) {
                return (int) $item->IdUser;
            }, $allID);

            $allID = implode(",",$allID);

            $lastChatRaw = DB::select("
            SELECT c.*, u.IdUser, u.Nama, u.FotoProfil
            FROM chat c
            JOIN users u ON (u.IdUser = c.IdSender OR u.IdUser = c.IdReceiver)
            WHERE (c.IdSender = ? OR c.IdReceiver = ?)
                AND (c.IdSender IN ($allID) OR c.IdReceiver IN ($allID))
                AND c.time IN (
                SELECT MAX(time)
                FROM chat
                WHERE (IdSender = ? OR IdReceiver = ?)
                    AND (IdSender IN ($allID) OR IdReceiver IN ($allID))
                GROUP BY CASE
                    WHEN IdSender = ? THEN IdReceiver
                    ELSE IdSender
                END
                )
                AND u.IdUser IN ($allID)
            ORDER BY c.time DESC;", [$myId,$myId,$myId,$myId,$myId]);

            $unread = DB::select("
            SELECT u.IdUser, COALESCE(COUNT(c.readStatus), 0) AS Count
            FROM users u
            LEFT JOIN chat c ON (u.IdUser = c.IdSender AND c.IdReceiver = ? AND c.readStatus = 0)
            WHERE u.IdUser IN ($allID)
            GROUP BY u.IdUser;
            ",[$myId]);
        }
        $produk = $produk->latest()->take(2)->get();


        return view('konsumen.beranda', compact('produk','lastChatRaw','unread'));
    }


    public function detailToko($IdToko){
        $detailToko = User::findOrFail($IdToko);
        $listProduks = Produk::where('IdUser',$IdToko)->paginate(4);
        return view("konsumen.toko",compact('detailToko','listProduks'));
    }

    public function umkmHome(){
        $ProdukUMKM = Produk::where('IdUser',Auth::User()->IdUser)->take(3)->get();
        $lastChatRaw = "";
        $unread = "";

        if(Auth::check()){
            $myId = Auth::User()->IdUser;

            $allID = DB::select("SELECT DISTINCT users.IdUser
            FROM users
            JOIN chat ON (users.IdUser = chat.IdSender AND chat.IdReceiver = '$myId')
                        OR (users.IdUser = chat.IdReceiver AND chat.IdSender = '$myId')");


            $allID = array_map(function($item) {
                return (int) $item->IdUser;
            }, $allID);

            $allID = implode(",",$allID);

            $lastChatRaw = DB::select("
            SELECT c.*, u.IdUser, u.Nama, u.FotoProfil
            FROM chat c
            JOIN users u ON (u.IdUser = c.IdSender OR u.IdUser = c.IdReceiver)
            WHERE (c.IdSender = ? OR c.IdReceiver = ?)
                AND (c.IdSender IN ($allID) OR c.IdReceiver IN ($allID))
                AND c.time IN (
                SELECT MAX(time)
                FROM chat
                WHERE (IdSender = ? OR IdReceiver = ?)
                    AND (IdSender IN ($allID) OR IdReceiver IN ($allID))
                GROUP BY CASE
                    WHEN IdSender = ? THEN IdReceiver
                    ELSE IdSender
                END
                )
                AND u.IdUser IN ($allID)
            ORDER BY c.time DESC;", [$myId,$myId,$myId,$myId,$myId]);

            $unread = DB::select("
            SELECT u.IdUser, COALESCE(COUNT(c.readStatus), 0) AS Count
            FROM users u
            LEFT JOIN chat c ON (u.IdUser = c.IdSender AND c.IdReceiver = ? AND c.readStatus = 0)
            WHERE u.IdUser IN ($allID)
            GROUP BY u.IdUser;
            ",[$myId]);
        }
        return view("umkm.beranda",compact("ProdukUMKM",'lastChatRaw','unread'));
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
