<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'user_id' => $this->user_id,
            'admin_id' => $this->admin_id,
            'message' => $this->message,
            'user_seen_at' => $this->user_seen_at,
            'created_at' => $this->created_at,
        ];
    }
}
