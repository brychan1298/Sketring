<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){
        try{
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id',$google_user->getId())->first();
            Auth::login($user);
            if(!$user){
                $new_user = User::create([
                    'Nama' => $google_user->getName(),
                    'Email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId()
                ]);

                Auth::login($new_user);

                return redirect()->intended('/');
            }else{
                Auth::login($user);
                return redirect()->intended('/');
            }
        }catch(\Throwable $th){
            dd("Something Went Wrong ". $th->getMessage());
        }
    }
}
