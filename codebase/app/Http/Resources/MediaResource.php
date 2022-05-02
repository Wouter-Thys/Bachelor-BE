<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class MediaResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'image' => base64_encode(file_get_contents($this->getPath()))
        ];
    }
}
