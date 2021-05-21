<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<5;$i++){
            DB::table('reviews')->insert(['hotel_id' => rand(1,4) , 'title' => 'cccc','content' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa']);
            DB::table('reviews')->insert(['hotel_id' => rand(1,4) , 'title' => 'dddd','content' => 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb']);
        }
    }
    
}
