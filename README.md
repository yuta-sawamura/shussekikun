# SHUSSEKIKUN とは

SHUSSEKIKUN(しゅっせきくん)は、管理者が会員の出席を管理できる Web システムです。<br/>
会員は店舗に置かれた端末(PC、タブレット、スマートフォン)から、共有アカウントを用いて出席します。管理者は会員・出席等の情報を管理することができます。

## 作成の背景

私は以前、管理者として空手道場を運営していました。会員の出席を紙で管理しており、アナログな管理方法で苦労した経験があります。そのような背景から管理者は、特別な機材を導入することなく端末を 1 台用意するだけで、出席管理ができる出席管理システムを作成しました。

<img width="1406" alt="スクリーンショット 2020-04-27 22 48 39" src="https://user-images.githubusercontent.com/29622529/80379657-58f5b580-88d9-11ea-843a-f15f211896f4.png">

## リンク

[https://shussekikun.com](https://shussekikun.com/)

## 使用技術

■ バックエンドエンド<br>

-   Laravel6.1
-   PHP7.3.20
-   PhpUnit

■ フロントエンドエンド<br>

-   JavaScript | jQuery
-   HTML | CSS
-   Bootstrap

■AWS<br>

-   EC2
-   ALB
-   RDS
-   Route53
-   ACM
-   VPC
-   S3
-   IAM

■ その他<br>

-   GitHub Actions(CI)
-   Docker | docker-compose
-   MySQL5.7
-   Nginx1.17.10
-   GitHub(GitHub Flow)
-   GitHub Projects(カンバンタスク管理)

### クラウドアーキテクチャ

![aws](https://user-images.githubusercontent.com/29622529/93402317-64b13b00-f8bf-11ea-89c2-4b9c7fa96ffe.png)

## 機能一覧

-   管理者機能
    -   認証機能
        -   登録 | 退会 | 削除
        -   権限(システム管理者 | 組織管理者 | 共有アカウント)
        -   ログイン | ログアウト | パスワードリセット(メール送信機能)
    -   プレミアム機能(Web API)
        -   決済機能 | 解約機能
    -   店舗管理機能
        -   登録 | 編集 | 削除
    -   会員管理機能(1 つの店舗は複数の会員が属している)
        -   検索 | ページネーション | 登録 | 編集 | 退会 | 削除
    -   カテゴリー管理機能(１つのカテゴリーは複数の会員にひも付き、会員検索の際に使用)
        -   登録 | 編集 | 削除
    -   お知らせ管理機能(店舗別に会員向けにお知らせ管理ができる)
        -   MarkDown 記法 | 検索 | ページネーション | 登録 | 編集 | 削除
    -   クラス管理機能
        -   登録 | 編集 | 削除
    -   スケジュール機能(クラスに曜日や時間を紐づけてスケジュールを作成)
        -   登録 | 編集 | 削除
-   会員機能(会員は店舗に置いてある端末から共有アカウントを使用する)
    -   検索機能
    -   出席機能
    -   出席ランキング閲覧機能
    -   お知らせ閲覧機能
-   その他
    -   SSL 化

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

## GitHub Flow(Git 運用方法)

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
