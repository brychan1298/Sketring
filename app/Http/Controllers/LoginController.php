<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Valiator;
// use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function Email()
    {
        return 'Email';
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
