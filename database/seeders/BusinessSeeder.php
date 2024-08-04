<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('businesses')->insert([
            'name'=> 'Compra',
            'description' => 'compra de inmuebles',
        ]);

        DB::table('businesses')->insert([
            'name'=> 'Venta',
            'description' => 'venta de inmuebles',
        ]);
        DB::table('businesses')->insert([
            'name'=> 'Permuta',
            'description' => 'permuta de inmuebles',
        ]);
    }
}
