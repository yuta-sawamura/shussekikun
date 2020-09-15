# SHUSSEKIKUN とは

SHUSSEKIKUN(しゅっせきくん)は、店舗オーナーが会員の出席を管理できる Web システムです。<br/>
会員は店舗に置かれた端末(PC、タブレット、スマートフォン)から、共通アカウントを用いて出席します。店舗オーナーは管理者アカントを用いて会員の出席情報を集計・閲覧できます。

## デザイン

<img width="1406" alt="スクリーンショット 2020-04-27 22 48 39" src="https://user-images.githubusercontent.com/29622529/80379657-58f5b580-88d9-11ea-843a-f15f211896f4.png">

[デザインの URL](https://yuuta1988.github.io/shussekikun-design/index.html)

## 作成の背景

私は以前、責任者として空手道場を運営していました。道場生の出席を紙ベースで管理しており、集計に苦労した経験があります。そんな背景から店舗オーナーは、特別な機材を導入することなく出席の管理ができ、会員は子どもでも直感的に出席できる Web システムを作成することにしました。

## 使用技術

■ 言語・フレームワーク・ライブラリ等<br>
Laravel6.1 | PHP7.3.20 | JavaScript | jQuery | HTML/CSS | Bootstrap

■RDB<br>
MySQL5.7

■AWS<br>
ECS | ALB | RDS | Route53 | ACM | VPC | S3 | EC2 | IAM

■ その他<br>
Docker | Nginx1.17.10 | GitHub | GitHub Actions(CI)

### クラウドアーキテクチャ

![aws](https://user-images.githubusercontent.com/29622529/93275128-06b92080-f7f7-11ea-92cc-8a2bd127a546.png)

## 機能一覧

-   会員機能
    -   管理画面
        -   管理者の編集機能
        -   出席管理会員の編集機能
        -   一般会員の追加・編集・削除機能
            -   種別カテゴリー
    -   会員画面・管理画面
        -   一般会員の検索機能
        -   一覧・詳細表示
        -   ログイン
        -   パスワード再発行
-   種別カテゴリー機能
    -   種別の追加・編集・削除機能
    -   一覧・詳細表示
-   クラス機能
    -   管理画面
        -   追加・編集・削除機能
    -   会員画面・管理画面
        -   一覧・詳細表示
        -   検索
-   出席機能
    -   会員画面
        -   一覧表示
        -   追加・編集・削除機能
        -   一括追加
        -   一括削除
        -   ランキング
            -   一覧(全体)
                -   種別
                -   年別
                -   月別
            -   詳細(個別)
                -   年別出席数・平均
                -   月別出席数・平均
        -   検索
-   決済機能
    -   管理画面
        -   月額追加
        -   カード情報変更
        -   解約

## DB 設計

■ER 図

![ER図](https://user-images.githubusercontent.com/29622529/89781780-eee2e280-db4e-11ea-9640-c5ff0e73aee7.jpg)

## Docker によるプロジェクト開始方法

docker がローカル端末にインストールされていない場合、docker のインストールが必要です。(Docker Desktop for Mac)

コンテナ起動

    docker-compose up -d

マイグレーション実行

    docker-compose exec phpfpm php artisan migrate

コンテナ停止

    docker-compose down

Composer Install

    docker run --rm --interactive --tty -v $PWD:/var/www/html learning-test_phpfpm composer install

テストコードの実行

    docker-compose exec phpfpm ./vendor/bin/phpunit

### 動作確認

| URL                     |
| :---------------------- |
| <http://localhost:8080> |

## GitHub flow(Git 運用方法)

| ブランチ名 | 概要               |
| ---------- | ------------------ |
| master     | デプロイ用ブランチ |
| feature    | 開発用ブランチ     |

| No. | ルール                                                                         |
| --- | ------------------------------------------------------------------------------ |
| 1.  | master ブランチは常にデプロイ可能である                                        |
| 2.  | 作業用ブランチを master から作成する                                           |
| 3.  | 作業用ブランチを定期的にプッシュする                                           |
| 4.  | プルリクエストを活用する                                                       |
| 5.  | プルリクエストが承認されたら master へマージする                               |
| 6.  | master へのマージが完了したら直ちにデプロイを行う                              |
| 7.  | ブランチの命名規則。<br>「ブランンチ名/イシュー番号」                          |
| 8.  | コミットの命名規則。<br>[種別(add or update or fix or delete)]概要<br><br>内容 |
