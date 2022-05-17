<?php

namespace App\Services;

use App\Models\Terrain;

class AddressService
{
    public static function addressToString(Terrain $terrain): string
    {
        return (
            $terrain->street.' '.$terrain->streetNumber.', '.$terrain->postcode.' '.$terrain->locality.', '.$terrain->province
        );
    }
}
