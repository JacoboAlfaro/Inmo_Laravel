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
            'name'=> 'Apartamento',
            'description' => '',
            'data_type' => 1
        ]);

        Characteristic::factory()->count(10)->create();
    }
}
