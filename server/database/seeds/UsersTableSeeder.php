<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'organization_id' => 1,
                'store_id' => 1,
                'category_id' => 1,
                'sei' => '澤村',
                'mei' => '勇太',
                'sei_kana' => 'サワムラ',
                'mei_kana' => 'ユウタ',
                'gender' => 1,
                'email' => 'sawammura1009@gmail.com',
                'birth' => '1988-10-09',
                'role' => 1,
                'status' => 1,
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31',
            ],
        ]);
    }
}
