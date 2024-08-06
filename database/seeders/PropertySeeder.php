<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('properties')->insert([
            'adress'=> 'cra 12 N61-75',
            'price' => 1231.212,
            'user_id' => 1,
            'location_id' => random_int(1, 6),
            'category_id' => random_int(1, 3),
            'business_id' => random_int(1, 3),
        ]);

        Property::factory()->count(15)->create([
            'user_id'=> 1
        ]);
    }
}
