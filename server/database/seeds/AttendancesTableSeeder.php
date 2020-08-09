<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start1 = Carbon::create('2019', '1', '1');
        $end1 = Carbon::create('2019', '12', '31');
        $min1 = strtotime($start1);
        $max1 = strtotime($end1);

        $start2 = Carbon::create('2020', '1', '1');
        $end2 = Carbon::create('2020', '12', '31');
        $min2 = strtotime($start2);
        $max2 = strtotime($end2);

        // 渋谷店
        $user_ids = [4, 6, 11];
        for ($i = 1; $i <= 25; $i++) {
            $date = rand($min1, $max1);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2020-06-10 21:07:31',
                    'updated_at' => '2020-06-10 21:07:31',
                ],
            ]);
        }
        $user_ids = [4, 6, 7, 8, 9, 10, 11, 12, 13, 14];
        for ($i = 26; $i <= 100; $i++) {
            $date = rand($min2, $max2);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2020-06-10 21:07:31',
                    'updated_at' => '2020-06-10 21:07:31',
                ],
            ]);
        }

        // 新宿店
        $user_ids = [18, 23];
        for ($i = 101; $i <= 125; $i++) {
            $date = rand($min1, $max1);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2020-06-10 21:07:31',
                    'updated_at' => '2020-06-10 21:07:31',
                ],
            ]);
        }
        $user_ids = [15, 16, 17, 18, 19, 21, 22, 23, 24];
        for ($i = 126; $i <= 150; $i++) {
            $date = rand($min2, $max2);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2020-06-10 21:07:31',
                    'updated_at' => '2020-06-10 21:07:31',
                ],
            ]);
        }

        // // 池袋店
        $user_ids = [29, 31, 34];
        for ($i = 151; $i <= 210; $i++) {
            $date = rand($min1, $max1);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2020-06-10 21:07:31',
                    'updated_at' => '2020-06-10 21:07:31',
                ],
            ]);
        }
        $user_ids = [25, 26, 27, 28, 29, 30, 31, 32, 33, 34];
        for ($i = 211; $i <= 278; $i++) {
            $date = rand($min2, $max2);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2020-06-10 21:07:31',
                    'updated_at' => '2020-06-10 21:07:31',
                ],
            ]);
        }
    }
}
