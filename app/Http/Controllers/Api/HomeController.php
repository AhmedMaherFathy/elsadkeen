<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\MatchResource;
use App\Http\Resources\UserResource;
use App\Traits\HttpResponse;

class HomeController extends Controller
{
    use HttpResponse;

    public function getMatches(Request $request)
    {
        $authUser = auth()->user();
        $authAttr = $authUser->attribute; // ✅ هنا الريليشن singular

        $search = $request->input('search');

        $matches = User::query()
            ->select('users.*', DB::raw("
                (
                    (CASE WHEN attribute.country_id = {$authAttr->country_id} THEN 20 ELSE 0 END) +
                    (CASE WHEN attribute.city_id = {$authAttr->city_id} THEN 30 ELSE 0 END) +
                    (CASE WHEN attribute.religious_commitment = '{$authAttr->religious_commitment}' THEN 10 ELSE 0 END) +
                    (CASE WHEN attribute.marital_status = '{$authAttr->marital_status}' THEN 10 ELSE 0 END) +
                    (CASE WHEN ABS(attribute.age - {$authAttr->age}) <= 3 THEN 10 ELSE 0 END) +
                    (CASE WHEN attribute.qualification_id = {$authAttr->qualification_id} THEN 5 ELSE 0 END) +
                    (CASE WHEN attribute.financial_situation_id = {$authAttr->financial_situation_id} THEN 5 ELSE 0 END) +
                    (CASE WHEN ABS(attribute.height - {$authAttr->height}) <= 5 THEN 5 ELSE 0 END) +
                    (CASE WHEN ABS(attribute.weight - {$authAttr->weight}) <= 5 THEN 5 ELSE 0 END) +
                    (CASE WHEN '{$authAttr->hijab}' = 'hijab' AND attribute.hijab = 'hijab' THEN 10 ELSE 0 END)
                ) as score
            "),
                DB::raw("CASE WHEN favorites.id IS NOT NULL THEN 1 ELSE 0 END as is_favorite") 
                )
            ->join('attributes as attribute', 'users.id', '=', 'attribute.user_id') // ✅ join ب alias
            ->leftJoin('favorites', function($join) use ($authUser) {
                $join->on('favorites.liked_user_id', '=', 'users.id')
                        ->where('favorites.user_id', '=', $authUser->id);
            })
            ->where('users.id', '!=', $authUser->id) // استبعاد المستخدم نفسه
            ->where('users.gender', '!=', $authUser->gender) // استبعاد نفس الجنس
            ->when($authUser->gender === 'male', function ($q) {
                // استبعاد المتزوجات لو المستخدم راجل
                $q->where('attribute.marital_status', '!=', 'married');
            })
            ->when($search, function ($q) use ($search) {
                $q->where('users.name', 'LIKE', "%{$search}%");
            })
            ->whereNotExists(function($query) use ($authUser) {
                $query->select(DB::raw(1))
                        ->from('ignores')
                        ->whereColumn('ignores.ignored_user_id', 'users.id')
                        ->where('ignores.user_id', $authUser->id);
            })
            ->with('attribute','attribute.nationality', 'attribute.city', 'attribute.country') 
            ->orderByDesc('score')
            ->paginate(10);
            // return response()->json($matches);
        return $this->paginatedResponse($matches, MatchResource::class);
    }
}
