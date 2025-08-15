<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Qualification extends Model
{
    use HasTranslations;

    protected $fillable =[
        'name'
    ];

    protected $translatable = [
        'name'
    ];
}
