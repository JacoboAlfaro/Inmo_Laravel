<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Characteristic;


class CharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('characteristics')->insert([
            'name'=> 'banos',
            'description' => '',
            'data_type' => 2
        ]);

        DB::table('characteristics')->insert([
            'name'=> 'habitaciones',
            'description' => '',
            'data_type' => 2
        ]);

        DB::table('characteristics')->insert([
            'name'=> 'porteria',
            'description' => '',
            'data_type' => 1
        ]);

        DB::table('characteristics')->insert([
            'name'=> 'piscina',
            'description' => '',
            'data_type' => 1
        ]);

        // Characteristic::factory()->count(20)->create();
    }
}
