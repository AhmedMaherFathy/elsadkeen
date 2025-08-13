<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations;

    protected $fillable=[
        'name',
        'country_id'
    ];

    protected $translatable = [
        'name'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
