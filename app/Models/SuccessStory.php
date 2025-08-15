<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SuccessStory extends Model
{
    use HasTranslations;
    
    protected $fillable=[
        'title',
        'content',
        'image',
        'status',
        'published_status',
    ];

    protected $translatable = [
        'title',
        'content'
    ];

    public function getImageAttribute($value)
    {
        return $value
            ? asset('storage/' . $value)
            : asset('assets/img/default.png');
    }

    public function setImageAttribute()
    {
        if (isset($this->attributes['image']) && !empty($this->attributes['image'])) {
            $this->attributes['image'] = 'storage/' . $this->attributes['image'];
        }
    }
}
