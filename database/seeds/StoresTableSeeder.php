<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            [
                'id' => 1,
                'organization_id' => 1,
                'name' => '渋谷店',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 2,
                'organization_id' => 1,
                'name' => '新宿店',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 3,
                'organization_id' => 1,
                'name' => '池袋店',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 4,
                'organization_id' => 2,
                'name' => '東中野店',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
        ]);
    }
}
