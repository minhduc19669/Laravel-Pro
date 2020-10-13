<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\District;
class DistrictController extends Controller
{
    //

    public function showDistrictInCity($city_id){
        $districts = District::where('city_id', $city_id)->select('id', 'name')->get();
        return response()->json($districts);
    }
}
