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
        
        DB::table('reviews')->insert(['hotel_id' => 1, 'title' => 'とても楽しめました','content' => '特に従業員の方の接客がよく、気持ちよく過ごすことができました。']);
        DB::table('reviews')->insert(['hotel_id' =>  1, 'title' => 'また来たいと思います。','content' => '最高の思い出になったので、また是非行きたいと思っております。']);
        DB::table('reviews')->insert(['hotel_id' =>  1, 'title' => '少し残念なとこがありました。','content' => '廊下に汚れが目立ち、ホテルがいいだけにもったいないと感じてしまいました。']);

    }
    
}
