<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['name' => 'シティホテル']);
        DB::table('categories')->insert(['name' => 'リゾートホテル']);
        DB::table('categories')->insert(['name' => 'ビジネスホテル']);
        DB::table('categories')->insert(['name' => '旅館']);
        DB::table('categories')->insert(['name' => '民宿']);
        DB::table('categories')->insert(['name' => 'ペンション']);
    }
}
