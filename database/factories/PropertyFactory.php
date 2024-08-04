<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Business;
use App\Models\Location;
use App\Models\User;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'adress'=> fake()->streetAddress(),
            'price' => fake()->randomFloat(2, 800, 10000),
            'user_id' => User::inRandomOrder()->first(),
            'location_id' => Location::inRandomOrder()->first(),
            'category_id' => Category::inRandomOrder()->first(),
            'business_id' => Business::inRandomOrder()->first(),
        ];
    }
}
