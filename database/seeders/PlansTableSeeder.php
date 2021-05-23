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
        for($i=1;$i<30;$i++){
            DB::table('plans')->insert(['name' => 'planA'.$i, 'hotel_id' => $i,'price' => rand(1,4).'0000', 'number_of_room' => rand(1,5)]);
            DB::table('plans')->insert(['name' => 'planB'.$i, 'hotel_id' => $i,'price' => rand(1,4).'0000', 'number_of_room' => rand(1,5)]);
            DB::table('plans')->insert(['name' => 'planC'.$i, 'hotel_id' => $i,'price' => rand(1,4).'0000', 'number_of_room' => rand(1,5)]);
            DB::table('plans')->insert(['name' => 'planD'.$i, 'hotel_id' => $i,'price' => rand(1,4).'0000', 'number_of_room' => rand(1,5)]);
        }
        
    }
}
