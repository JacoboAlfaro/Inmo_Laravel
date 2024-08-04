<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            'department'=> 'Caldas',
            'city' => 'Manizales'
        ]);

        DB::table('locations')->insert([
            'department'=> 'Cundinamarca',
            'city' => 'Bogota'
            
        ]);

        DB::table('locations')->insert([
            'department'=> 'Risaralda',
            'city' => 'Pereira'
        ]);

        DB::table('locations')->insert([
            'department'=> 'Quindio',
            'city' => 'Armenia'
        ]);

        DB::table('locations')->insert([
            'department'=> 'Antioquia',
            'city' => 'Medellin'
        ]);

        DB::table('locations')->insert([
            'department'=> 'Valle del Cauca',
            'city' => 'Cali'
        ]);
    }
}
