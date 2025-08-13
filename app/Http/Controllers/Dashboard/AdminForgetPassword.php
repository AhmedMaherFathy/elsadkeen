<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Otp;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Mail\ForgetPasswordOtp;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminForgetPassword extends Controller
{
    public function showForgetForm()
    {
        return view('dashboard.forget-password.email');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:admins,email']);

        $admin = Admin::where('email', $request->email)->first();

        $otp = Otp::generateOtp($admin->email);

        Mail::to($admin->email)->send(new ForgetPasswordOtp($otp->code, $admin->name));
        Session::put('verified_email', $request->email);

        return redirect()->route('admin.verify.form')->with([
            'email' => $admin->email,
            'success' => 'تم إرسال كود التحقق إلى بريدك الإلكتروني.'
        ]);
    }

    public function showVerifyForm()
    {
        return view('dashboard.forget-password.verify');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            // 'email' => 'required|email',
            'otp'   => 'required|digits:4',
        ]);
        $email = Session::get('verified_email');
        // return $email;
        $otpRecord = Otp::where('identifier', $email)->first();

        if (! $otpRecord || $otpRecord->code !== $request->otp) {
            return back()->withErrors(['otp' => 'رمز التحقق غير صحيح']);
        }

        if ($otpRecord->expires_at < now()) {
            $otpRecord->delete();
            return back()->withErrors(['otp' => 'انتهت صلاحية رمز التحقق']);
        }
        $token = Hash::make($request->otp);
        DB::table('password_reset_tokens')->updateOrInsert([
            'email' => $email,
        ], [
            'token' => $token,
            'created_at' => now(),
        ]);
        Session::put('token', $token);
        $otpRecord->delete();

        return redirect()->route('admin.reset.form')->with('email', $email);
    }

    public function showResetForm()
    {
        return view('dashboard.forget-password.reset');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            // 'email' => 'required|email',
            // 'token' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
        $email = Session::get('verified_email');
        $token = Session::get('token');
        session()->forget('verified_email');
        session()->forget('token');
        $reset = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->first();
        // return $token;
        // if (! $reset || ! Hash::check($token, $reset->token)) {
        //     return back()->withErrors(['token' => 'رمز إعادة التعيين غير صالح']);
        // }

        Admin::where('email', $email)
            ->update(['password' => Hash::make($request->new_password)]);

        DB::table('password_reset_tokens')->where('email', $email)->delete();

        return redirect()->route('dashboard.login')->with('success', 'تم إعادة تعيين كلمة المرور بنجاح.');
    }
}