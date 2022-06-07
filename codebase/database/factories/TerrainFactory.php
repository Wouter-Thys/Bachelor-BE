<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Terrain>
 */
class TerrainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $yesNo = $this->faker->boolean();

        return [
            "user_id" => $this->faker->numberBetween(1, 2),
            "name" => $this->faker->name(),
            "description" => $this->faker->text(50),
            "street" => $this->faker->streetName(),
            "streetNumber" => $this->faker->numberBetween(1, 150),
            "postcode" => $this->faker->numberBetween(2000, 4000),
            "province" => $this->faker->word(),
            "locality" => $this->faker->word(),
            "water" => $this->faker->boolean(),
            "electricity" => $this->faker->boolean(),
            "threePhaseElectricity" => $this->faker->boolean(),
            "sanitaryBlock" => $yesNo,
            "showers" => $yesNo,
            "toilets" => $yesNo,
            "sinks" => $yesNo,
            "openFire" => $this->faker->boolean(),
            "hudo" => $this->faker->boolean(),
            "digging" => $this->faker->boolean(),
            "capacity" => $this->faker->numberBetween(100, 1500),
            "views" => $this->faker->numberBetween(100, 1500),
            "hectare" => $this->faker->numberBetween(1, 20),
            "supermarket_rating" => $this->faker->numberBetween(1, 5),
            "activities_rating" => $this->faker->numberBetween(1, 5),
            "remote_rating" => $this->faker->numberBetween(1, 5),
            "bakery_rating" => $this->faker->numberBetween(1, 5),
            "firstAid_rating" => $this->faker->numberBetween(1, 5),
        ];
    }
}
