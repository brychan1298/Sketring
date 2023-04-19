<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Valiator;
// use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function edit(){
        $provinces = Province::all();
        $title = "Register";
        return view('konsumen.editProfile',compact('provinces'));
    }

    public function update(Request $request){
        $validatedUpdate = [
            'Nama' => 'required|max:255',
            'Email' => 'required|email:dns',
            'Nohp' => 'required|min:10|max:14',
            'Alamat' => 'required',
            'IdKota' => 'required',
            'FotoProfil' => 'image|file|max:1024'
        ];

        $validatedData = $request->validate($validatedUpdate);

        if($request->file('FotoProfil')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['FotoProfil'] = $request->file('FotoProfil')->store();
        }

        User::where('IdUser',Auth::User()->IdUser)->update($validatedData);
        return redirect('/profilekonsumen')->with('success','Profile telah berhasil diedit');
    }

    public function index(){
        return view('login');
    }

    public function store(Request $request)
    {
        $validatedLogin = $request->validate([
            'Email' => 'required|email:dns',
            'password' => 'required'
        ]);

        // dd($validatedLogin);

        if(Auth::attempt($validatedLogin)){
            $request->session()->regenerate();
            $role = Auth::user()->Role;
            switch ($role){
                case 'konsumen':
                    return redirect()->intended('/');
                case 'umkm':
                    return redirect()->intended('/umkm');
                default:
                    return "Harusnya ini gk mungkin terjadi";
            }
        }

        return back()->with('loginError','Login anda gagal!!');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
