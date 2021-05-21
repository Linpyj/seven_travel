<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert(['name' => 'planA', 'hotel_id' => 1,'price' => '10000', 'number_of_room' => '3']);
        DB::table('plans')->insert(['name' => 'planB', 'hotel_id' => 1,'price' => '30000', 'number_of_room' => '2']);
        DB::table('plans')->insert(['name' => 'planA', 'hotel_id' => 2,'price' => '10000', 'number_of_room' => '1']);
        DB::table('plans')->insert(['name' => 'planB', 'hotel_id' => 3,'price' => '20000', 'number_of_room' => '3']);
    }
}
