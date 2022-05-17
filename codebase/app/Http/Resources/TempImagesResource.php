<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TempImagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        ray($this->resource->getUrl());

        return [
            'id' => $this->id,
            'url' => $this->resource->getUrl(),
        ];
    }
}
