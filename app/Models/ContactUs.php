<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
        'email',
        'title',
        'description',
        'user_id'
    ];
}
