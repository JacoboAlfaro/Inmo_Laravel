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
            'description' => '',
            'user_id' => 1
        ]);

        DB::table('categories')->insert([
            'name'=> 'Casa',
            'description' => '',
            'user_id' => 1
        ]);
        DB::table('categories')->insert([
            'name'=> 'Lote',
            'description' => '',
            'user_id' => 1
        ]);

        Category::factory()->count(5)->create([
            'user_id'=> 1
        ]);

    }
}
