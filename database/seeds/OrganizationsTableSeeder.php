<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            [
                'id' => 1,
                'name' => 'フィットネスクラブ アルノ',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 2,
                'name' => '東進塾',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ]
        ]);
    }
}
