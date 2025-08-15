<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'liked_user_id',
    ];
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
