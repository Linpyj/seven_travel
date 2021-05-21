<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotels')->insert(['name' => 'シティホテル', 'category_id' => 1,'prefecture' => '埼玉', 'address' => '秩父市○○', 'check_in' => '15:00:00.000', 'check_out' => '11:00:00.000', 'tel' => '08054887823']);
        DB::table('hotels')->insert(['name' => 'ホテル池田', 'category_id' => 2, 'prefecture' => '東京', 'address' => '立川市○○', 'check_in' => '15:00:00.000', 'check_out' => '11:00:00.000', 'tel' => '080578873']);
        DB::table('hotels')->insert(['name' => 'ホテル森の水', 'category_id' => 3, 'prefecture' => '千葉','address' => '千葉市○○', 'check_in' => '15:00:00.000', 'check_out' => '11:00:00.000', 'tel' => '08029673957']);
        DB::table('hotels')->insert(['name' => 'シティ田中', 'category_id' => 4, 'prefecture' => '埼玉', 'address' => '入間市○○', 'check_in' => '15:00:00.000', 'check_out' => '11:00:00.000', 'tel' => '08096969696']);
    }
}
