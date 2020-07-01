<?php

use Illuminate\Database\Seeder;

class ClassworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classworks')->insert([
            [
                'id' => 1,
                'store_id' => 1,
                'name' => '一般初級',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 2,
                'store_id' => 1,
                'name' => '一般上級',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 3,
                'store_id' => 1,
                'name' => '少年低学年',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 4,
                'store_id' => 1,
                'name' => '少年高学年',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 5,
                'store_id' => 2,
                'name' => '一般上級',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
        ]);
    }
}
