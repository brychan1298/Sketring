<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Redirect;

class GoogleAuthController extends Controller
{
    public function redirect(Request $request){

        if($request->roleId){
            session(['roleId' => $request->roleId]);
            return Socialite::driver('google')->redirect();
        }
        else{
            return Socialite::driver('google')->redirect();
        }
    }

    public function callbackGoogle(Request $request){
        try{
            try{
                $roleId = 2;
                if(session('roleId')){
                    $roleId = 1;
                }
                $google_user = Socialite::driver('google')->user();
            }catch(Exception $e){
                return Redirect::to('auth/google');
            }


            $user = User::where('google_id',$google_user->getId())->first();
            if(!$user){
                $new_user = User::create([
                    'Nama' => $google_user->getName(),
                    'Email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'Role' => $roleId
                ]);

                Auth::login($new_user);

                if($roleId == 1){
                    return redirect()->intended('/umkm');
                }
                return redirect()->intended('/');
            }else{
                // $user = User::where('google_id',$google_user->getId())->get();
                Auth::login($user);
                if($user->Role == 1){
                    return redirect()->intended('/umkm');
                }
                return redirect()->intended('/');
            }
        }catch(\Throwable $th){
            dd("Something Went Wrong ". $th->getMessage());
        }
    }
}
