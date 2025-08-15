<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                         => $this->id,
            'name'                       => $this->name,
            'email'                      => $this->email,
            'country_code'               => $this->country_code,
            'phone'                      => $this->phone,
            'gender'                     => __("user.$this->gender"),
            'image'                      => $this->image,
            'fcm_token'                  => $this->fcm_token,
            'token'                      => $this->token,
            'created_at'                 => $this->created_at,
            'attribute'                  => new AttributeResource($this->whenLoaded('attribute')),
        ];
    }
}
