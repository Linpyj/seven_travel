<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<10;$i++){
            DB::table('users')->insert([
                'name' => '山田'.$i,
                'address' => '東京都',
                'tel' => '08011111111'.$i,
                'email' => 'yamada'.$i.'@example.com',
                'birthday' => '1998-04-01',
                'password' => 'yamadayamada'.$i
                ]);
            DB::table('users')->insert([
                'name' => '鈴木'.$i,
                'address' => '大阪府',
                'tel' => '08011112222'.$i,
                'email' => 'suzuki'.$i.'@example.com',
                'birthday' => '1997-04-01',
                'password' => 'suzukisuzuki'.$i
                ]);
            DB::table('users')->insert([
                'name' => '佐藤'.$i,
                'address' => '北海道',
                'tel' => '08011113333'.$i,
                'email' => 'sato'.$i.'@example.com',
                'birthday' => '1996-04-01',
                'password' => 'satosato'.$i
            ]);
        }
    }
}
