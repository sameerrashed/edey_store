<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\city;
use App\Models\province;

class LocationController extends Controller
{
    public function getLocations($countryId)
    {
        $provinces = province::where('country_id', $countryId)
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        $cities = city::where('country_id', $countryId)
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        return response()->json([
            'provinces' => $provinces,
            'cities' => $cities,
        ]);
    }
}
