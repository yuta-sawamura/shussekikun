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
                'content' => '山田インストラクターは体調不良のため、**7月10日~7月20日まで休館**します。
7月の月謝に関しては、10日分差し引きます。ご不明な点がございましたら、事務局までご連絡ください。',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 2,
                'store_id' => 1,
                'title' => '再開のお知らせ',
                'content' => '6月から渋谷店は**営業を再開**します。

下記の点に注意して営業します。

* 換気の徹底
* 手洗い
* アルコールの消毒
* ソーシャルディスタンスの確保

みなさまのご来店をお待ちしております。',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 3,
                'store_id' => 2,
                'title' => '自粛期間',
                'content' => 'コロナウイルスの影響で5月は**休館**です。

オンラインレッスンは毎日発信しますので、日を追ってご連絡致します。',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
        ]);
    }
}
