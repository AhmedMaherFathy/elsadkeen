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
            'skin_color_id',
            'physique_id',
            'religious_commitment',
            'prayer', 
            'smoking',
            'hijab',
            'gender',
            'qualification_id',
            'financial_situation_id',
            'job',
            // 'work_field',
            'income',
            'health_condition_id',
            'life_partner',
            'about_me',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function financialSituation()
    {
        return $this->belongsTo(FinancialSituation::class);
    }

    public function healthCondition()
    {
        return $this->belongsTo(HealthCondition::class);
    }

    public function physique()
    {
        return $this->belongsTo(Physique::class);
    }

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }

    public function skinColor()
    {
        return $this->belongsTo(SkinColor::class);
    }
}
