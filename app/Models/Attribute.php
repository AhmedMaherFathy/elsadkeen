<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable =[
            'user_id',
            'nationality_id',
            'city_id',
            'country_id',
            'marital_status',
            'type_of_marriage',
            'age',
            'children_number',
            'weight',
            'height',
            'skin_color',
            'physique',
            'religious_commitment',
            'prayer', 
            'smoking',
            'hijab',
            'gender',
            'educational_qualification',
            'financial_situation',
            'job',
            // 'work_field',
            'income',
            'health_condition',
            'life_partner',
            'about_me',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
