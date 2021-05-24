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
        for($i=1;$i<10;$i++){
            DB::table('hotels')->insert(['name' => 'ホテル'.$i, 'category_id' => rand(1,6), 'prefecture' => '神奈川', 'address' => '秩父市○○', 'check_in' => '15:00:00.000', 'check_out' => '11:00:00.000', 'tel' => '0805488782'.$i]);
            DB::table('hotels')->insert(['name' => 'ホテル池田'.$i, 'category_id' => rand(1,6), 'prefecture' => '東京', 'address' => '立川市○○', 'check_in' => '15:00:00.000', 'check_out' => '11:00:00.000', 'tel' => '08057887'.$i]);
            DB::table('hotels')->insert(['name' => 'ホテル森の水'.$i, 'category_id' => rand(1,6), 'prefecture' => '千葉','address' => '千葉市○○', 'check_in' => '15:00:00.000', 'check_out' => '11:00:00.000', 'tel' => '0802967395'.$i]);
            DB::table('hotels')->insert(['name' => 'シティ田中'.$i, 'category_id' => rand(1,6), 'prefecture' => '埼玉', 'address' => '入間市○○', 'check_in' => '15:00:00.000', 'check_out' => '11:00:00.000', 'tel' => '0809696969'.$i]);
        }
    }
}
