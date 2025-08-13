<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
            'name',
            'email',
            'country_code',
            'phone',
            'password',
            'gender',
            'fcm_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function attribute()
    {
        return $this->hasOne(Attribute::class);
    }

    public function getImageAttribute()
    {
        $image = $this->attributes['image'] ?? null;

        if ($image && file_exists(public_path('storage/' . $image))) {
            return asset('storage/' . $image);
        }

        return asset($this->gender === 'male' ? 'assets/img/male.png' : 'assets/img/female.png');
    }

    public function likes()
    {
        // Users I like
        return $this->belongsToMany(User::class, 'favorites', 'user_id', 'liked_user_id')
                    ->withTimestamps();
    }
    public function usersILike()
    {
        return $this->belongsToMany(User::class, 'favorites', 'liked_user_id', 'user_id');
    }
}
