<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;

class RegisterController extends Controller
{
    public function index($roleId){
        $provinces = Province::all();
        $title = "Register";
        return view('register',compact('provinces','title','roleId'));
    }

    public function fetchKota(Request $request)
    {
        $data['states'] = Regency::where("province_id", $request->Province_id)
                                ->get(["name", "id"]);
        return response()->json($data);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'Nama' => 'required|max:255',
            'Email' => 'required|email:dns',
            'password' => 'required|min:5|max:255',
            'Nohp' => 'required|min:10|max:14',
            'Alamat' => 'required',
            'IdKota' => 'required',
            'Role' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login');
    }
}
