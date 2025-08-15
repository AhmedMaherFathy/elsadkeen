<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Favorite;
use App\Models\Ignore;

class UserLikeController extends Controller
{
    use HttpResponse;

    public function likeUser($id)
    {
        $user = auth()->user();

        if ($user->id == $id) {
            return response()->json(['message' => 'لا يمكنك الاعجاب بنفسك'], 400);
        }

        DB::transaction(function () use ($user, $id) {
            Ignore::where('user_id', $user->id)
                ->where('ignored_user_id', $id)
                ->delete();

            $user->likes()->syncWithoutDetaching([$id]);
        });


        return $this->successResponse(message: 'تم الإعجاب بالمستخدم بنجاح');
    }

    public function myFavoriteUsers()
    {
        $user = auth()->user();
        $favoriteIds = Favorite::where('user_id',$user->id)->pluck('liked_user_id');
        // return $favoriteIds;
        $users = User::whereIn('id',$favoriteIds)->paginate();
        return $this->paginatedResponse($users, UserResource::class );
    }

    public function addedMeToFav()
    {
        $user = auth()->user();
        $favoriteIds = Favorite::where('liked_user_id',$user->id)->pluck('user_id');
        $users = User::whereIn('id',$favoriteIds)->paginate();
        return $this->paginatedResponse($users, UserResource::class);
    }
}
