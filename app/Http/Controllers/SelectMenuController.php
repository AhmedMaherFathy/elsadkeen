<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\PhysiqueResource;
use App\Models\City;
use App\Models\Country;
use App\Models\FinancialSituation;
use App\Models\HealthCondition;
use App\Models\Physique;
use App\Models\Qualification;
use App\Models\SkinColor;
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

    public function physiqueList()
    {
        $physiques = Physique::select('id','name')->get();
        return response()->json(PhysiqueResource::collection($physiques));
    }

    public function financialSituationList()
    {
        $situation = FinancialSituation::select('id','name')->get();
        return response()->json(PhysiqueResource::collection($situation));
    }

    public function healthConditionList()
    {
        $situation = HealthCondition::select('id','name')->get();
        return response()->json(PhysiqueResource::collection($situation));
    }

    public function skinColorList()
    {
        $situation = SkinColor::select('id','name')->get();
        return response()->json(PhysiqueResource::collection($situation));
    }

    public function qualificationList()
    {
        $situation = Qualification::select('id','name')->get();
        return response()->json(PhysiqueResource::collection($situation));
    }

}
