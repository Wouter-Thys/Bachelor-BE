<?php

namespace App\Http\Resources;

use App\Models\RentTerrain;
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
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            "water" => $this->water,
            "electricity" => $this->electricity,
            "threePhaseElectricity" => $this->threePhaseElectricity,
            "sanitaryBlock" => $this->sanitaryBlock,
            "showers" => $this->showers,
            "toilets" => $this->toilets,
            "sinks" => $this->sinks,
            "capacity" => $this->capacity,
            "hectare" => $this->hectare,
            "supermarket_rating" => $this->supermarket_rating,
            "activities_rating" => $this->activities_rating,
            "remote_rating" => $this->remote_rating,
            "bakery_rating" => $this->bakery_rating,
            "firstAid_rating" => $this->firstAid_rating,
            "google_supermarket_rating" => $this->google_supermarket_rating,
            "google_activities_rating" => $this->google_activities_rating,
            "google_remote_rating" => $this->google_remote_rating,
            "google_bakery_rating" => $this->google_bakery_rating,
            "google_firstAid_rating" => $this->google_firstAid_rating,
            "images" => ImageResource::collection($this->getMedia('terrainImages')),
            "owner" => UserResource::make($this->user),
            "rented_dates" => RentTerrainResource::collection(RentTerrain::with('user')->where('terrain_id',
                $this->id)->get()),
        ];
    }
}
