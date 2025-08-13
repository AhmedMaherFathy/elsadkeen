<?php

namespace App\Models;

use App\Traits\HttpResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{

    protected $fillable = [
        'title',
        'content',
        'image',
        'published_status'
    ];

    // public function getImageAttribute()
    // {
    //     if($this->attributes['image'] !== null) {
    //         return asset('storage/' . $this->attributes['image']);
    //     }
    // }
    
    public function getImageAttribute($value)
    {
        return $value
            ? asset('storage/' . $value)
            : null;
    }

    public function setImageAttribute($value)
    {
        if ($value && is_file($value)) {
            if (!empty($this->attributes['image']) && Storage::disk('public')->exists($this->attributes['image'])) {
                Storage::disk('public')->delete($this->attributes['image']);
            }

            // Store new image
            $path = $value->store('blogs', 'public');
            $this->attributes['image'] = $path;
        }
    }
}
