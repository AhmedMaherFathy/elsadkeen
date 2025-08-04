<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    protected $fillable = [
        'identifier',
        'code',
        'expires_at',
    ];

    public static function generateOtp($email)
    {
        $otp = rand(1000, 9999);

        $expiresAt = now()->addMinutes(5)->format('Y-m-d H:i:s');

        $otpRecord = self::updateOrInsert(
            ['identifier' => $email],
            [
                'code' => $otp,
                'expires_at' => $expiresAt,
                'updated_at' => now(),
            ]
        );
    
        // Fetch and return the updated or created record
        return self::where('identifier', $email)->first();
    }
}
