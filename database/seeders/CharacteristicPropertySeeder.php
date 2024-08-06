<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Property;
use App\Models\Characteristic;
use App\Models\CharacteristicProperty;  



class CharacteristicPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('characteristic_properties')->insert([
            'value'=> '2',
            'property_id' => 2,
            'characteristic_id' => 1,
            
        ]);

        DB::table('characteristic_properties')->insert([
            'value'=> '3',
            'property_id' => 2,
            'characteristic_id' => 2,
        ]);

        DB::table('characteristic_properties')->insert([
            'value'=> '1',
            'property_id' => 1,
            'characteristic_id' => 2,
        ]);

        DB::table('characteristic_properties')->insert([
            'value'=> '6',
            'property_id' => 6,
            'characteristic_id' => 2,
        ]);

        DB::table('characteristic_properties')->insert([
            'value'=> '3',
            'property_id' => 3,
            'characteristic_id' => 1,
        ]);

        DB::table('characteristic_properties')->insert([
            'value'=> '4',
            'property_id' => 1,
            'characteristic_id' => 1,
        ]);
        
        DB::table('characteristic_properties')->insert([
            'value'=> 'SI',
            'property_id' => 3,
            'characteristic_id' => 3,
        ]);

        DB::table('characteristic_properties')->insert([
            'value'=> 'SI',
            'property_id' => 2,
            'characteristic_id' => 4,
        ]);

        DB::table('characteristic_properties')->insert([
            'value'=> 'SI',
            'property_id' => 2,
            'characteristic_id' => 3,
        ]);

        DB::table('characteristic_properties')->insert([
            'value'=> 'NO',
            'property_id' => 3,
            'characteristic_id' => 4,
        ]);
        // CharacteristicProperty::factory()->count(30)->create();

    }
}
