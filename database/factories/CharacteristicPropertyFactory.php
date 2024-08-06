<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Property;
use App\Models\Characteristic;
;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CharacteristicProperty>
 */
class CharacteristicPropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'value' => fake()->word(),
            'property_id' => Property::inRandomOrder()->first(),
            'characteristic_id' => Characteristic::inRandomOrder()->first(),
        ];
    }
}
