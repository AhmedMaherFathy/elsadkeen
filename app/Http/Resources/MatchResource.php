<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'name'            => $this->name,
            'image'           => $this->image,
            'age'             => $this->attribute->age,
            'gender'          => $this->gender,
            'nationality'     => $this->attribute->nationality->name,
            'country'         => $this->attribute->country->name,
            'city'            => $this->attribute->city->name,
            'nationality'     => $this->attribute->nationality->name,
            'job'             => $this->attribute->job,
            'match_percentage'=> round(((float) $this->score / 110) * 100, 2),
            'is_favorite'     => $this->is_favorite,
        ];
    }
}
