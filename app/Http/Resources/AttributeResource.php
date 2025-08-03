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
        return [
            'nationality'                => $this->whenLoaded('nationality'),
            'nationality_id'             => $this->nationality_id,
            'marital_status'             => $this->marital_status,
            'type_of_marriage'           => $this->type_of_marriage,
            'age'                        => $this->age,
            'children'                   => $this->children,
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
            'work_field'                 => $this->work_field,
            'income'                     => $this->income,
            'health_condition'           => $this->health_condition,
        ];
    }
}
