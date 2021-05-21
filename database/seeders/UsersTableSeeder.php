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
        DB::table('users')->insert([
            'name' => '山田',
            'address' => '東京都',
            'tel' => '08011111111',
            'email' => 'yamada@example.com',
            'birthday' => '1998-04-01',
            'password' => 'yamadayamada'
            ]);
        DB::table('users')->insert([
            'name' => '鈴木',
            'address' => '大阪府',
            'tel' => '08011112222',
            'email' => 'suzuki@example.com',
            'birthday' => '1997-04-01',
            'password' => 'suzukisuzuki'
            ]);
        DB::table('users')->insert([
            'name' => '佐藤',
            'address' => '北海道',
            'tel' => '08011113333',
            'email' => 'sato@example.com',
            'birthday' => '1996-04-01',
            'password' => 'satosato'
            ]);
    }
}
