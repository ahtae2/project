<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;

class WilayahController extends Controller
{
    public function getProvince() {
        $provinces = Province::pluck('name', 'id')->sortBy('name');

        return $provinces;
    }

    public function getCity(Request $request) {
        $cities = City::where('province_id', $request->get('id'))
        ->pluck('name', 'id')->sortBy('name');

        return response()->json($cities);
    }

    public function getDistrict(Request $request) {
        $districts = District::where('city_id', $request->get('id'))
        ->pluck('name', 'id')->sortBy('name');

        return response()->json($districts);
    }
}
