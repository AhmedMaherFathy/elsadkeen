<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Models\City;
use App\Models\Country;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class SelectMenuController extends Controller
{
    use HttpResponse;

    public function countryList()
    {
        $countries = Country::select('id','name')->cursor();

        return response()->json(CountryResource::collection($countries));
    }

    public function cityList($id)
    {
        $cities = City::select('id','name','country_id')->where('country_id',$id)->cursor();

        return response()->json(CityResource::collection($cities));
    }
}
