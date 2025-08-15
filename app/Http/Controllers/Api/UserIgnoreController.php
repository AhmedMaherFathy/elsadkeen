<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Ignore;
use App\Models\Favorite;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserIgnoreController extends Controller
{
    use HttpResponse;

    public function IgnoreUser($id)
    {
        $user = auth()->user();

        if ($user->id == $id) {
            return response()->json(['message' => 'لا يمكنك تجاهل نفسك'], 400);
        }

        DB::transaction(function () use ($user, $id) {
            Favorite::where('user_id', $user->id)
                ->where('liked_user_id', $id)
                ->delete();

            $user->ignores()->syncWithoutDetaching([$id]);
        });
        
        return $this->successResponse(message: 'تم تجاهل المستخدم');
    }

    public function myIgnoredUsers()
    {
        $user = auth()->user();
        $favoriteIds = Ignore::where('user_id', $user->id)->pluck('ignored_user_id');
        // return $favoriteIds;
        $users = User::whereIn('id', $favoriteIds)->paginate();
        return $this->paginatedResponse($users, UserResource::class);
    }

    public function peopleIgnoredMe()
    {
        $user = auth()->user();
        $favoriteIds = Ignore::where('ignored_user_id', $user->id)->pluck('user_id');
        $users = User::whereIn('id', $favoriteIds)->paginate();
        return $this->paginatedResponse($users, UserResource::class);
    }
}
