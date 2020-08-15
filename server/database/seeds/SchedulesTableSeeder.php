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
                'start_at' => '21:00',
                'end_at' => '22:00',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 2,
                'store_id' => 1,
                'classwork_id' => 1,
                'day' => 1,
                'start_at' => '10:00',
                'end_at' => '11:30',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 3,
                'store_id' => 1,
                'classwork_id' => 1,
                'day' => 2,
                'start_at' => '21:00',
                'end_at' => '22:00',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 4,
                'store_id' => 2,
                'classwork_id' => 2,
                'day' => 2,
                'start_at' => '12:00',
                'end_at' => '13:30',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 5,
                'store_id' => 2,
                'classwork_id' => 3,
                'day' => 4,
                'start_at' => '14:00',
                'end_at' => '14:30',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 6,
                'store_id' => 3,
                'classwork_id' => 4,
                'day' => 5,
                'start_at' => '10:00',
                'end_at' => '11:30',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 7,
                'store_id' => 1,
                'classwork_id' => 1,
                'day' => 3,
                'start_at' => '17:00',
                'end_at' => '18:00',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 8,
                'store_id' => 3,
                'classwork_id' => 2,
                'day' => 3,
                'start_at' => '13:00',
                'end_at' => '14:30',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 9,
                'store_id' => 1,
                'classwork_id' => 3,
                'day' => 4,
                'start_at' => '19:00',
                'end_at' => '20:00',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 10,
                'store_id' => 1,
                'classwork_id' => 4,
                'day' => 4,
                'start_at' => '18:00',
                'end_at' => '19:30',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 11,
                'store_id' => 1,
                'classwork_id' => 4,
                'day' => 5,
                'start_at' => '18:30',
                'end_at' => '19:00',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 12,
                'store_id' => 1,
                'classwork_id' => 3,
                'day' => 5,
                'start_at' => '10:00',
                'end_at' => '11:30',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 13,
                'store_id' => 1,
                'classwork_id' => 3,
                'day' => 6,
                'start_at' => '14:00',
                'end_at' => '15:30',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 14,
                'store_id' => 1,
                'classwork_id' => 2,
                'day' => 7,
                'start_at' => '14:00',
                'end_at' => '15:30',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
        ]);
    }
}
