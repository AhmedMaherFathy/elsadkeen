<?php

namespace App\Models;

use App\Traits\HttpResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'content',
        'image',
        'published_status'
    ];

    protected $translatable = [
        'title',
        'content'
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
            : asset('assets/img/success-story.png');
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

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }

}
