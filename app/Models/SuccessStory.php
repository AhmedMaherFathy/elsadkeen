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
        info($this->attributes['image']);
        return asset('storage/' . $this->attributes['image']) ?? asset('storage/success-story.png');
    }

    public function setImageAttribute()
    {
        if (isset($this->attributes['image']) && !empty($this->attributes['image'])) {
            $this->attributes['image'] = 'storage/' . $this->attributes['image'];
        }
    }
}
