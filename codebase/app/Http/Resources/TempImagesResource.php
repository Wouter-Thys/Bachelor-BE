<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TempImagesResource extends JsonResource
{
    public function toArray($request): array
    {
        ray($this->resource->getUrl());

        return [
            'id' => $this->id,
            'url' => $this->resource->getUrl(),
        ];
    }
}
