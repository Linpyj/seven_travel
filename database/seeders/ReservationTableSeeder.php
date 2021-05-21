<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            'user_id' => rand(1,3),
            'plan_id' => 1,
            'check_in' => '2021-05-21',
            'check_out' => '2021-05-23',
            'status' => 1,
            'number_of_rooms' => 3
            ]);
        DB::table('reservations')->insert([
            'user_id' => rand(1,3),
            'plan_id' => 2,
            'check_in' => '2021-05-24',
            'check_out' => '2021-05-25',
            'status' => 1,
            'number_of_rooms' => 2
            ]);
        DB::table('reservations')->insert([
            'user_id' => rand(1,3),
            'plan_id' => rand(1,4),
            'check_in' => '2021-05-18',
            'check_out' => '2021-05-20',
            'status' => 1,
            'number_of_rooms' => 1
            ]);
    }
}
