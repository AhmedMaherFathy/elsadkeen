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

    public function setImageAttribute($value)
    {
        if ($value) {
            // If it's a file uploaded via request
            if ($value instanceof \Illuminate\Http\UploadedFile) {
                $path = $value->store('images', 'public'); 
                $this->attributes['image'] = $path;
            } else {
                // If it's already a string (like updating with same path)
                $this->attributes['image'] = $value;
            }
        }
    }

    public function getImageAttribute($value)
    {
        if ($value && file_exists(public_path('storage/' . $value))) {
            return asset('storage/' . $value);
        }

        return asset($this->gender === 'male' ? 'assets/img/male.png' : 'assets/img/female.png');
    }

    public function likes()
    {
        // Users I like
        return $this->belongsToMany(User::class, 'favorites', 'user_id', 'liked_user_id')
                    ->withTimestamps();
    }

    public function ignores()
    {
        // Users I like
        return $this->belongsToMany(User::class, 'ignores', 'user_id', 'ignored_user_id')
                    ->withTimestamps();
    }

    public function usersILike()
    {
        return $this->belongsToMany(User::class, 'favorites', 'liked_user_id', 'user_id');
    }
}
