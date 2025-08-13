<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
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
            'marital_status'             => $this->marital_status,
            'type_of_marriage'           => $this->type_of_marriage,
            'age'                        => $this->age,
            'children'                   => $this->children_number,
            'weight'                     => $this->weight,
            'height'                     => $this->height,
            'skin_color'                 => $this->skin_color,
            'physique'                   => $this->physique,
            'religious_commitment'       => $this->religious_commitment,
            'prayer'                     => $this->prayer,
            'smoking'                    => $this->smoking,
            'hijab'                      => $this->hijab,
            'educational_qualification'  => $this->educational_qualification,
            'financial_situation'        => $this->financial_situation,
            'job'                        => $this->job,
            'income'                     => $this->income,
            'health_condition'           => $this->health_condition,
            'life_partner'               => $this->life_partner,
            'about_me'                   => $this->about_me,
        ];
    }
}
