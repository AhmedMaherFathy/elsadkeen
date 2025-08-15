<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\JsonResource;

class AttributeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // info($this->user_id);
        $gender = DB::table('users')->where('id',$this->user_id)->select('gender')->first();
        info($gender->gender);
        $locale = app()->getLocale();
        return [
            // 'nationality'                => $this->whenLoaded('nationality'),
            'id'                         => $this->id,
            'nationality' => $this->when(
                $this->relationLoaded('nationality'),
                fn () => $this->nationality?->getTranslation('name', app()->getLocale())
            ),

            'city' => $this->when(
                $this->relationLoaded('city'),
                fn () => $this->city?->getTranslation('name', app()->getLocale())
            ),

            'country' => $this->when(
                $this->relationLoaded('country'),
                fn () => $this->country?->getTranslation('name', app()->getLocale())
            ),

            'skin_color' => $this->when(
                $this->relationLoaded('skinColor'),
                fn () => $this->skinColor?->getTranslation('name', app()->getLocale())
            ),

            'health_condition' => $this->when(
                $this->relationLoaded('healthCondition'),
                fn () => $this->healthCondition?->getTranslation('name', app()->getLocale())
            ),

            'physique' => $this->when(
                $this->relationLoaded('physique'),
                fn () => $this->physique?->getTranslation('name', app()->getLocale())
            ),

            'qualification' => $this->when(
                $this->relationLoaded('qualification'),
                fn () => $this->qualification?->getTranslation('name', app()->getLocale())
            ),

            'financial_situation' => $this->when(
                $this->relationLoaded('financialSituation'),
                fn () => $this->financialSituation?->getTranslation('name', app()->getLocale())
            ),
            'marital_status'             => $locale == 'ar' ? ($gender->gender == "male" ? __("user.{$this->marital_status}") :  __("user.{$this->marital_status}_she") ) : __("user.{$this->marital_status}"),
            'type_of_marriage'           => __("user.{$this->type_of_marriage}"),
            'age'                        => $this->age,
            'children'                   => $this->children_number,
            'weight'                     => $this->weight,
            'height'                     => $this->height,
            // 'skin_color'                 => $this->skin_color,
            // 'physique'                   => $this->physique,
            'religious_commitment'       => __("user.{$this->religious_commitment}"),
            'prayer'                     => __("user.{$this->prayer}"),
            'smoking'                    => $this->smoking ? __('user.smoking') : __('user.not_smoking'),
            'hijab'                      => __("user.{$this->hijab}"),
            // 'educational_qualification'  => $this->educational_qualification,
            // 'financial_situation'        => $this->financial_situation,
            'job'                        => $this->job,
            'income'                     => $this->income,
            // 'health_condition'           => $this->health_condition,
            'life_partner'               => $this->life_partner,
            'about_me'                   => $this->about_me,
        ];
    }
}
