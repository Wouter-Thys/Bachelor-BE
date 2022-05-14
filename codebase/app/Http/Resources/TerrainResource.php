<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TerrainResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "street" => $this->street,
            "streetNumber" => $this->streetNumber,
            "postcode" => $this->postcode,
            "province" => $this->province,
            "locality" => $this->locality,
            "water" => $this->water,
            "electricity" => $this->electricity,
            "threePhaseElectricity" => $this->threePhaseElectricity,
            "sanitaryBlock" => $this->sanitaryBlock,
            "showers" => $this->showers,
            "toilets" => $this->toilets,
            "sinks" => $this->sinks,
            "max_people" => $this->max_people,
            "hectare" => $this->hectare,
            "supermarket_rating" => $this->supermarket_rating,
            "activities_rating" => $this->activities_rating,
            "remote_rating" => $this->remote_rating,
            "wood_rating" => $this->wood_rating,
            "playground_rating" => $this->playground_rating,
            "images" => ImageResource::collection($this->getMedia('terrainImages')),
            "owner" => UserResource::make($request->user()),
        ];
    }
}
