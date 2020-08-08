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
        $start = Carbon::create('2019', '1', '1');
        $end = Carbon::create('2020', '12', '31');
        $min = strtotime($start);
        $max = strtotime($end);

        // 渋谷店
        $user_ids = [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
        for ($i = 1; $i <= 50; $i++) {
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
                    'created_at' => '2020-06-10 21:07:31',
                    'updated_at' => '2020-06-10 21:07:31',
                ],
            ]);
        }

        // 新宿店
        $user_ids = [15, 16, 17, 18, 19, 20, 21, 22, 23, 24];
        for ($i = 51; $i <= 100; $i++) {
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
                    'created_at' => '2020-06-10 21:07:31',
                    'updated_at' => '2020-06-10 21:07:31',
                ],
            ]);
        }

        // 池袋店
        $user_ids = [15, 16, 17, 18, 19, 20, 21, 22, 23, 24];
        for ($i = 101; $i <= 150; $i++) {
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
                    'created_at' => '2020-06-10 21:07:31',
                    'updated_at' => '2020-06-10 21:07:31',
                ],
            ]);
        }
    }
}
