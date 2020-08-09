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
        // 2019年1月渋谷店
        $user_ids = [4];
        for ($i = 1; $i <= 5; $i++) {
            $start = Carbon::create('2019', '1', '1');
            $end = Carbon::create('2019', '1', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2019年1月新宿店
        $user_ids = [5];
        for ($i = 6; $i <= 10; $i++) {
            $start = Carbon::create('2019', '1', '1');
            $end = Carbon::create('2019', '1', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(2, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2019年2月渋谷店
        $user_ids = [4, 6];
        for ($i = 11; $i <= 15; $i++) {
            $start = Carbon::create('2019', '2', '1');
            $end = Carbon::create('2019', '2', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2019年3月渋谷店
        $user_ids = [4, 6, 7, 8];
        for ($i = 16; $i <= 20; $i++) {
            $start = Carbon::create('2019', '3', '1');
            $end = Carbon::create('2019', '3', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2019年4月渋谷店
        $user_ids = [4, 8, 9];
        for ($i = 21; $i <= 25; $i++) {
            $start = Carbon::create('2019', '4', '1');
            $end = Carbon::create('2019', '4', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2019年5月渋谷店
        $user_ids = [4, 6, 7, 8, 9, 10];
        for ($i = 26; $i <= 30; $i++) {
            $start = Carbon::create('2019', '5', '1');
            $end = Carbon::create('2019', '5', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2019年6月渋谷店
        $user_ids = [7, 8, 9, 10, 11];
        for ($i = 31; $i <= 35; $i++) {
            $start = Carbon::create('2019', '6', '1');
            $end = Carbon::create('2019', '6', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2019年7月渋谷店
        $user_ids = [4, 6, 7, 8, 9, 10, 11, 12];
        for ($i = 36; $i <= 40; $i++) {
            $start = Carbon::create('2019', '7', '1');
            $end = Carbon::create('2019', '7', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2019年8月渋谷店
        $user_ids = [7, 8, 9, 10, 11, 12, 13];
        for ($i = 41; $i <= 45; $i++) {
            $start = Carbon::create('2019', '8', '1');
            $end = Carbon::create('2019', '8', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2019年9月渋谷店
        $user_ids = [4, 6, 7, 8, 9, 13, 14];
        for ($i = 46; $i <= 50; $i++) {
            $start = Carbon::create('2019', '9', '1');
            $end = Carbon::create('2019', '9', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2019年10月池袋店
        $user_ids = [5, 15];
        for ($i = 51; $i <= 55; $i++) {
            $start = Carbon::create('2019', '10', '1');
            $end = Carbon::create('2019', '10', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(4, 5),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2019年11月池袋店
        $user_ids = [5, 15, 16];
        for ($i = 56; $i <= 60; $i++) {
            $start = Carbon::create('2019', '11', '1');
            $end = Carbon::create('2019', '11', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(4, 5),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2019年12月池袋店
        $user_ids = [5, 17];
        for ($i = 61; $i <= 65; $i++) {
            $start = Carbon::create('2019', '12', '1');
            $end = Carbon::create('2019', '12', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(4, 5),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2020年1月渋谷店
        $user_ids = [4, 6, 7, 8, 9, 13, 14];
        for ($i = 66; $i <= 68; $i++) {
            $start = Carbon::create('2020', '1', '1');
            $end = Carbon::create('2020', '1', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand(
                $min,
                $max
            );
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2020年1月池袋店
        $user_ids = [5, 15, 16, 17, 18];
        for ($i = 69; $i <= 70; $i++) {
            $start = Carbon::create('2020', '1', '1');
            $end = Carbon::create('2020', '1', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(4, 5),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2020年2月渋谷店
        $user_ids = [4, 6, 7, 8, 9, 13, 14];
        for ($i = 71; $i <= 72; $i++) {
            $start = Carbon::create('2020', '2', '1');
            $end = Carbon::create('2020', '2', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand(
                $min,
                $max
            );
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2020年2月池袋店
        $user_ids = [16, 17, 18, 19, 20, 21];
        for ($i = 73; $i <= 75; $i++) {
            $start = Carbon::create('2020', '2', '1');
            $end = Carbon::create('2020', '2', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(4, 5),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2020年3月渋谷店
        $user_ids = [4, 6, 7, 8, 9, 13, 14];
        for ($i = 76; $i <= 77; $i++) {
            $start = Carbon::create('2020', '3', '1');
            $end = Carbon::create('2020', '3', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand(
                $min,
                $max
            );
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2020年3月池袋店
        $user_ids = [5, 15, 16, 22];
        for ($i = 78; $i <= 80; $i++) {
            $start = Carbon::create('2020', '3', '1');
            $end = Carbon::create('2020', '3', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(4, 5),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2020年4月池袋店
        $user_ids = [5, 15, 16, 17, 18, 19, 20, 21, 22, 23];
        for ($i = 81; $i <= 85; $i++) {
            $start = Carbon::create('2020', '4', '1');
            $end = Carbon::create('2020', '4', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(4, 5),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2020年4月渋谷店
        $user_ids = [4, 6, 7, 8, 9, 13, 14];
        for ($i = 86; $i <= 87; $i++) {
            $start = Carbon::create('2020', '4', '1');
            $end = Carbon::create('2020', '4', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand(
                $min,
                $max
            );
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2020年5月池袋店
        $user_ids = [5, 15, 16, 17, 18];
        for ($i = 88; $i <= 90; $i++) {
            $start = Carbon::create('2020', '5', '1');
            $end = Carbon::create('2020', '5', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(4, 5),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2020年6月渋谷店
        $user_ids = [4, 6, 7, 14, 25, 26];
        for ($i = 91; $i <= 95; $i++) {
            $start = Carbon::create('2020', '6', '1');
            $end = Carbon::create('2020', '6', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2020年7月渋谷店
        $user_ids = [4, 6, 7, 8, 9, 13, 14, 25, 26];
        for ($i = 96; $i <= 100; $i++) {
            $start = Carbon::create('2020', '7', '1');
            $end = Carbon::create('2020', '7', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2020年8月渋谷店
        $user_ids = [4, 6, 7, 8, 9, 13, 14, 25, 26, 27, 28, 29];
        for ($i = 101; $i <= 105; $i++) {
            $start = Carbon::create('2020', '8', '1');
            $end = Carbon::create('2020', '8', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }

        // 2020年9月渋谷店
        $user_ids = [26, 27, 28, 29, 30, 31, 32, 33, 34];
        for ($i = 106; $i <= 110; $i++) {
            $start = Carbon::create('2020', '9', '1');
            $end = Carbon::create('2020', '9', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $k = array_Rand($user_ids);
            $user_id = $user_ids[$k];
            DB::table('attendances')->insert([
                [
                    'id' => $i,
                    'user_id' => $user_id,
                    'schedule_id' => rand(1, 3),
                    'date' => $date,
                    'created_at' => '2019-01-31 21:07:31',
                    'updated_at' => '2019-01-31 21:07:31',
                ],
            ]);
        }
    }
}
