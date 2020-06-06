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
                'organization_id' => null,
                'store_id' => 1,
                'category_id' => 1,
                'sei' => '澤村',
                'mei' => '勇太',
                'sei_kana' => 'サワムラ',
                'mei_kana' => 'ユウタ',
                'gender' => 1,
                'mail' => 'sawammura1009@gmail.com',
                'birth' => '1988-10-09',
                'role' => 1,
                'status' => 1,
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31',
            ],
            [
                'id' => 2,
                'organization_id' => 1,
                'store_id' => null,
                'category_id' => null,
                'sei' => '桜木',
                'mei' => 'くるみ',
                'sei_kana' => 'サクラギ',
                'mei_kana' => 'クルミ',
                'gender' => 2,
                'mail' => 'sawammura1009+1@gmail.com',
                'birth' => '1988-10-09',
                'role' => 3,
                'status' => 1,
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31',
            ],
            [
                'id' => 3,
                'organization_id' => 1,
                'store_id' => null,
                'category_id' => null,
                'sei' => '山田',
                'mei' => '道正',
                'sei_kana' => null,
                'mei_kana' => null,
                'gender' => null,
                'mail' => null,
                'birth' => null,
                'role' => 5,
                'status' => 1,
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31',
            ],
        ]);
        factory(App\User::class, 30)->create();
    }
}
