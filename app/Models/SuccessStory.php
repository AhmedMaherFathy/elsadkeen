<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    protected $fillable=[
        'bride_name',
        'groom_name',
        'title',
        'description',
        'image',
        'status',
        'published_status',
    ];

    public function getImageAttribute()
    {
        return asset('storage/' . $this->attributes['image']) ?? asset('storage/success-story.png');
    }

    // public function setImageAttribute()
    // {

    // }
}
