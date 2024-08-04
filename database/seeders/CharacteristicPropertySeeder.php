<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Property;
use App\Models\Characteristic;

class CharacteristicPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('characteristic_property')->insert([
            'value'=> 'true',
            /* 'property_id' => Property::inRandomOrder()->first(),
            'characteristic_id' => Characteristic::inRandomOrder()->first(), */
            'property_id' => 1,
            'characteristic_id' => 1,
            
        ]);

        DB::table('characteristic_property')->insert([
            'value'=> 'test',
            /* 'property_id' => Property::inRandomOrder()->first(),
            'characteristic_id' => Characteristic::inRandomOrder()->first(), */
            'property_id' => 2,
            'characteristic_id' => 2,
        ]);
    }
}
