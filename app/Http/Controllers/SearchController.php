<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Attribute;
use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    use HttpResponse;

    public function search(Request $request)
    {
        $query = User::with('attribute','attribute.nationality', 'attribute.city', 'attribute.country');

        if ($request->has('user_name')) {
            $query->where('name', 'LIKE','%'.$request->user_name.'%');
        }

        if ($request->has('nationality_id')) {
            $query->whereHas('attribute', function ($q) use ($request) {
                $q->where('nationality_id', $request->nationality_id);
            });
        }

        if ($request->has('country_id')) {
            $query->whereHas('attribute', function ($q) use ($request) {
                $q->where('country_id', $request->country_id);
            });
        }

        if ($request->has('city_id')) {
            $query->whereHas('attribute', function ($q) use ($request) {
                $q->where('city_id', $request->city_id);
            });
        }

        if ($request->has('type_of_marriage')) {
            $query->whereHas('attribute', function ($q) use ($request) {
                $q->where('type_of_marriage', $request->type_of_marriage);
            });
        }

        if ($request->has('marital_status')) {
            $query->whereHas('attribute', function ($q) use ($request) {
                $q->where('marital_status', $request->marital_status);
            });
        }

        if ($request->has('from_age') || $request->has('to_age')) {
            $query->whereHas('attribute', function ($q) use ($request) {
                if ($request->filled('from_age')) {
                    $q->where('age', '>=', $request->from_age);
                }
                if ($request->filled('to_age')) {
                    $q->where('age', '<=', $request->to_age);
                }
            });
        }

        if ($request->has('from_weight') || $request->has('to_weight')) {
            $query->whereHas('attribute', function ($q) use ($request) {
                if ($request->filled('from_weight')) {
                    $q->where('weight', '>=', $request->from_weight);
                }
                if ($request->filled('to_weight')) {
                    $q->where('weight', '<=', $request->to_weight);
                }
            });
        }

        if ($request->has('from_hight') || $request->has('to_hight')) {
            $query->whereHas('attribute', function ($q) use ($request) {
                if ($request->filled('from_hight')) {
                    $q->where('hight', '>=', $request->from_hight);
                }
                if ($request->filled('to_hight')) {
                    $q->where('hight', '<=', $request->to_hight);
                }
            });
        }

        if($request->has('skin_color'))
        {
            $query->whereHas('attribute',function($q) use ($request){
                $q->where('skin_color',$request->skin_color);
            });
        }

        if($request->has('educational_qualification'))
        {
            $query->whereHas('attribute',function($q) use ($request){
                $q->where('educational_qualification',$request->educational_qualification);
            });
        }

        if($request->has('latest'))
        {
            if($request->latest == 1)
                $query->latest();
        }

        $users = $query->get();
        // return response()->json($users);
        return $this->successResponse(UserResource::collection($users));
    }
}
