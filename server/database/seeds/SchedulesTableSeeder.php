<?php

use Illuminate\Database\Seeder;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            [
                'id' => 1,
                'store_id' => 1,
                'classwork_id' => 1,
                'day' => 1,
                'start_at' => '10:00',
                'end_at' => '11:30',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 2,
                'store_id' => 1,
                'classwork_id' => 1,
                'day' => 1,
                'start_at' => '21:00',
                'end_at' => '22:00',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 3,
                'store_id' => 2,
                'classwork_id' => 2,
                'day' => 2,
                'start_at' => '12:00',
                'end_at' => '13:30',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 4,
                'store_id' => 3,
                'classwork_id' => 3,
                'day' => 4,
                'start_at' => '14:00',
                'end_at' => '14:30',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 5,
                'store_id' => 3,
                'classwork_id' => 4,
                'day' => 5,
                'start_at' => '10:00',
                'end_at' => '11:30',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
        ]);
    }
}
