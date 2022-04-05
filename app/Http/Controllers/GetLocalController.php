<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetLocalController extends Controller
{
    
    public function district(Request $request)
    {
         
        $city_id = $request->city_id;
        // dd($city_id);
         
        $districts = DB::table('districts')->where('matp',$city_id)
                              ->get();
        return response()->json([
            'districts' => $districts
        ]);
    }

    public function village(Request $request)
    {
         
        $district_id = $request->district_id;
         
        $villages = DB::table('villages')->where('maqh',$district_id)
                              ->get();

        return response()->json([
            'villages' => $villages
        ]);
    }
}
