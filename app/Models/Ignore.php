<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ignore extends Model
{
    protected $fillable = [
        'user_id',
        'ignored_user_id',
    ];
}
