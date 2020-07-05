<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                'id' => 1,
                'store_id' => 1,
                'title' => '休館のお知らせ',
                'content' => 'お休みです。',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 2,
                'store_id' => 1,
                'title' => '再開のお知らせ',
                'content' => '再開します。',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 3,
                'store_id' => 2,
                'title' => '自粛期間',
                'content' => 'しばらく休館です。',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
        ]);
    }
}
