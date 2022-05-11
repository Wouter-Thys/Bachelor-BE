<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'email_verified_at' => $this->email_verified_at,
            'phone_number_verified_at' => $this->phone_number_verified_at,
            'organization' => $this->organization,
            'roles' => $this->getRoleNames(),
            'landlordRequestImage' => MediaResource::collection($this->whenLoaded('media'))
        ];
    }
}
