<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Physique extends Model
{
    use HasTranslations;

    protected $fillable =[
        'name'
    ];

    protected $translatable = [
        'name'
    ];
}
