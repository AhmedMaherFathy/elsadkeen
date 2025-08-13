<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nationality extends Model
{
    use HasTranslations;

    protected $translatable = ['name'];
    
    protected $fillable = ['name'];

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
