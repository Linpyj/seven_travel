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
            DB::table('plans')->insert(['name' => '素泊まりプラン', 'hotel_id' => 1,'price' => '6000', 'number_of_room' => 8]);
            DB::table('plans')->insert(['name' => '日帰りプラン', 'hotel_id' => 1,'price' => '12000', 'number_of_room' => 8]);
            DB::table('plans')->insert(['name' => 'スタンダードプラン', 'hotel_id' => 1,'price' => '15000', 'number_of_room' => 6]);
            DB::table('plans')->insert(['name' => 'カップルプラン', 'hotel_id' => 1,'price' => '24000', 'number_of_room' => 3]);
            DB::table('plans')->insert(['name' => '貸切露天風呂プラン', 'hotel_id' => 1,'price' => '32000', 'number_of_room' => 2]);
        
    }
}
