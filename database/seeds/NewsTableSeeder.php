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
7月の月謝に関しては、10日分差し引きます。皆さまにはご迷惑をおかけしますが、クラスが再開できるよう大事取らせいただきます。

ご不明な点がございましたら事務局までご連絡ください。

![](https://user-images.githubusercontent.com/29622529/93725240-6db84a00-fbe8-11ea-91d6-e49a7565ec7e.jpg)',
                'created_at' => '2020-09-05 21:07:31',
                'updated_at' => '2020-09-05 21:07:31'
            ],
            [
                'id' => 2,
                'store_id' => 1,
                'title' => '店内清掃のお知らせ',
                'content' => '2020年10月28日(水)は一部の設備を店内清掃を行います。そのため、13:00~14:00の間は一部の施設が利用ができません。
また、下記の日程で店内清掃を行う予定です。時間について後日お知らせします。

* 11月20日(金)
* 11月28日(土)

ご不明な点がございましたら、事務局までご連絡ください。

![](https://user-images.githubusercontent.com/29622529/93725052-06e66100-fbe7-11ea-9392-b6521db26148.png)',
                'created_at' => '2020-09-30 21:07:31',
                'updated_at' => '2020-09-30 21:07:31'
            ],
            [
                'id' => 3,
                'store_id' => 2,
                'title' => '自粛期間',
                'content' => 'コロナウイルスの影響で10月は**休館**です。

オンラインレッスンは毎日発信しますので、日を追ってご連絡致します。

![](https://user-images.githubusercontent.com/29622529/93725240-6db84a00-fbe8-11ea-91d6-e49a7565ec7e.jpg)',
                'created_at' => '2020-06-10 21:07:31',
                'updated_at' => '2020-06-10 21:07:31'
            ],
            [
                'id' => 4,
                'store_id' => 1,
                'title' => 'コロナ対策の徹底',
                'content' => '**コロナ対策**を徹底しております。

下記の点に注意して営業しております。

* 来館時の体温チェック
* 換気の徹底
* 手洗い
* アルコール消毒
* ソーシャルディスタンスの確保

みなさまのご来店をお待ちしております。

![](https://user-images.githubusercontent.com/29622529/93724947-4496ba00-fbe6-11ea-843f-7fae817be597.png)',
                'created_at' => '2020-10-02 21:07:31',
                'updated_at' => '2020-10-02 21:07:31'
            ],
        ]);
    }
}
