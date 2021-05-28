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
            DB::table('hotels')->insert(['name' => 'ホテル札幌', 'category_id' => rand(1,6), 'prefecture' => '北海道', 'address' => '北海道札幌市中央区旭ヶ丘7-4-21', 'check_in' => '15:00:00.000', 'check_out' => '9:00:00.000', 'tel' => '08054887821']);
            DB::table('hotels')->insert(['name' => 'ホテル仙台', 'category_id' => rand(1,6), 'prefecture' => '宮城', 'address' => '宮城県仙台市青葉区赤坂4-6-26', 'check_in' => '15:00:00.000', 'check_out' => '10:00:00.000', 'tel' => '08057887543']);
            DB::table('hotels')->insert(['name' => 'ホテル池袋', 'category_id' => rand(1,6), 'prefecture' => '東京','address' => '東京都豊島区池袋5-10-3', 'check_in' => '15:00:00.000', 'check_out' => '9:00:00.000', 'tel' => '08029673953']);
            DB::table('hotels')->insert(['name' => 'ホテル入間', 'category_id' => rand(1,6), 'prefecture' => '埼玉', 'address' => '埼玉県入間市東町8-5-6', 'check_in' => '15:00:00.000', 'check_out' => '10:00:00.000', 'tel' => '09099816535']);
            DB::table('hotels')->insert(['name' => 'ホテル鶴見', 'category_id' => rand(1,6), 'prefecture' => '神奈川', 'address' => '神奈川県横浜市鶴見区朝日町3-6-21', 'check_in' => '15:00:00.000', 'check_out' => '10:00:00.000', 'tel' => '08079400131']);
            DB::table('hotels')->insert(['name' => 'ホテル浜松', 'category_id' => rand(1,6), 'prefecture' => '静岡', 'address' => '静岡県浜松市中区葵東4-5-9', 'check_in' => '15:00:00.000', 'check_out' => '11:00:00.000', 'tel' => '08096987652']);
            DB::table('hotels')->insert(['name' => 'ホテル金沢', 'category_id' => rand(1,6), 'prefecture' => '金沢', 'address' => '石川県金沢市青草町2-5-3', 'check_in' => '15:00:00.000', 'check_out' => '10:00:00.000', 'tel' => '09022496135']);
            DB::table('hotels')->insert(['name' => 'ホテル堺', 'category_id' => rand(1,6), 'prefecture' => '大阪', 'address' => '大阪府堺市堺区石津長5-6-8', 'check_in' => '15:00:00.000', 'check_out' => '11:00:00.000', 'tel' => '08033254461']);
            DB::table('hotels')->insert(['name' => 'ホテル舞鶴', 'category_id' => rand(1,6), 'prefecture' => '京都', 'address' => '京都府舞鶴氏青井65-2-8', 'check_in' => '15:00:00.000', 'check_out' => '10:00:00.000', 'tel' => '09076439989']);
            DB::table('hotels')->insert(['name' => 'ホテル下関', 'category_id' => rand(1,6), 'prefecture' => '山口', 'address' => '山口県下関市生野町3-5-15', 'check_in' => '15:00:00.000', 'check_out' => '10:00:00.000', 'tel' => '09067238885']);
            DB::table('hotels')->insert(['name' => 'ホテル松山', 'category_id' => rand(1,6), 'prefecture' => '愛媛', 'address' => '愛媛県松山市朝美3-8-27', 'check_in' => '15:00:00.000', 'check_out' => '10:00:00.000', 'tel' => '08011922960']);
            DB::table('hotels')->insert(['name' => 'ホテル博多', 'category_id' => rand(1,6), 'prefecture' => '福岡', 'address' => '福岡県福岡市博多区相生町4-1-8', 'check_in' => '15:00:00.000', 'check_out' => '10:00:00.000', 'tel' => '09066547737']);
            DB::table('hotels')->insert(['name' => 'ホテル那覇', 'category_id' => rand(1,6), 'prefecture' => '沖縄', 'address' => '沖縄県那覇市曙4-5-13', 'check_in' => '15:00:00.000', 'check_out' => '10:00:00.000', 'tel' => '08096987652']);
        }
    }