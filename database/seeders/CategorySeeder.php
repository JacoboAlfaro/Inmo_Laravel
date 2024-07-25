<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name'=> 'Apartamento',
            'description' => ''
        ]);

        DB::table('categories')->insert([
            'name'=> 'Casa',
            'description' => ''
        ]);
        DB::table('categories')->insert([
            'name'=> 'Lote',
            'description' => ''
        ]);

        Category::factory(5)->create();

    }
}
