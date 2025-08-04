<?php

namespace App\Http\Controllers\Api;

use App\Models\Otp;
use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Mail\ForgetPasswordOtp;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ForgetPasswordRequest;

class ForgetPasswordController extends Controller
{
    use HttpResponse;

    public function SendOtp(ForgetPasswordRequest $request)
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        // if ($user->email_verified_at == null) {
        //     return $this->errorResponse(message:__('user.verify_account'));
        // }

        $otp = Otp::generateOtp($user->email);

        Mail::to($user->email)->send(new ForgetPasswordOtp(
            $otp->code,
            $user['name']
        ));

        return $this->successResponse(data: [
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user['name'],
            'otp_expires_at' => $otp->expires_at,
        ],
            message: 'Otp sent successfully');
    }

    public function verifyOtp(VerifyRequest $request)
    {
        $validated = $request->validated();

        $otpRecord = Otp::where('identifier', $validated['email'])->first();

        if (! $otpRecord || $otpRecord->code != $validated['otp']) {
            return $this->errorResponse(message: __('user.invalid_otp'));
        }

        if ($otpRecord->expires_at < now()) {
            $otpRecord->delete();

            return $this->errorResponse(message: __('user.otp_expired'));
        }

        DB::table('password_reset_tokens')->updateOrInsert([
            'email' => $validated['email'],
        ], [
            'email' => $validated['email'],
            'token' => Hash::make($validated['otp']),
            'created_at' => now(),
        ]);

        $fetchedData = DB::table('password_reset_tokens')
        ->where('email', $validated['email'])
        ->first();

        $otpRecord->delete();

        return $this->successResponse(data: $fetchedData, message: __('user.otp_verified'));
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $validated = $request->validated();
        try {
            $updatePassword = DB::table('password_reset_tokens')
                ->where([
                    'email' => $validated['email'],
                    'token' => $validated['token'],
                ])
                ->first();

                if (! $updatePassword) {
                return $this->errorResponse(message: 'Invalid token!');
            }
            User::query()->where('email', $validated['email'])
                ->update(['password' => Hash::make($validated['new_password'])]);
            
            DB::table('password_reset_tokens')->where(['email' => $validated['email']])->delete();

            return $this->successResponse(message: __('user.password_changed'));
        } catch (\Exception $e) {
            return $this->errorResponse(message: $e->getMessage());
        }
    }
}
