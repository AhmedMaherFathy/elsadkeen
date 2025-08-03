<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Attribute;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreUserAttributeRequest;

class AuthController extends Controller
{
    use HttpResponse;

    public function register(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        $user['token'] = $user->createToken('user')->plainTextToken;

        return $this->successResponse(UserResource::make($user),message:__('auth.registered'));
    }

    public function storeAttributes(StoreUserAttributeRequest $request)
    {
        $validated = $request->validated();
        $user = auth()->user();
        $validated['user_id'] = $user->id;
        if($user->attribute()->exists())
        {
            return $this->errorResponse(message:__('user.has_attribute'));
        }
        Attribute::create($validated);

        return $this->successResponse();
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $user = User::where('email',$validated['email'])->first();
        if($user && Hash::check($validated['password'], $user['password']))
        {
            $user->token = $user->createToken('user')->plainTextToken;
            return $this->successResponse(UserResource::make($user), __('auth.loggedIn'));
        }
        return $this->errorResponse(message:__('auth.wrong_credential'));
    }

    public function updateFcmToken(Request $request)
    {
        $validated = $request->validate([
            'fcm_token' => 'required'
        ]);
        auth()->user()->update([
                'fcm_token' => $validated['fcm_token'],
            ]);
        return $this->successResponse();
    }

    public function getProfile()
    {
        
    }

}
