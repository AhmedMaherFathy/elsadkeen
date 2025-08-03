<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NationalityResource;
use App\Models\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
    public function nationalityList()
    {
        $Nationalities = Nationality::select('id','name')->cursor();
        // info(app()->getLocale());
        return response()->json(NationalityResource::collection($Nationalities));
    }
}
