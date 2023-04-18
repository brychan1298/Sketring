<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class IndoRegionController extends Controller
{
    public function form(){

        // Get semua data
        $provinces = Province::all();

        return view('tesDaerah',compact('provinces'));
    }

    public function fetchState(Request $request)
    {
        $data['states'] = Regency::where("province_id", $request->Province_id)
                                ->get(["name", "id"]);
        return response()->json($data);
    }
}
