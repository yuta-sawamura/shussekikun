# SHUSSEKIKUNとは

SHUSSEKIKUN(しゅっせきくん)は、店舗オーナーが会員の出席を管理できるWebシステムです。
会員は店舗に置かれた端末(PC、タブレット、スマートフォン)から、共通アカウントを用いて出席します。店舗オーナーは管理者アカントを用いて管理画面から会員の出席情報を閲覧することができます。

## デザイン

<img width="1406" alt="スクリーンショット 2020-04-27 22 48 39" src="https://user-images.githubusercontent.com/29622529/80379657-58f5b580-88d9-11ea-843a-f15f211896f4.png">

[デザインのURL](https://yuuta1988.github.io/shussekikun-design/index.html)

■想定する店舗
- 塾
- 習い事教室
- クラス参加型のフィットネスジム

■会員が使用できる機能
- 出席機能
- 出席ランキング閲覧機能
- お知らせ閲覧機能

■店舗オーナーが使用できる機能
- 店舗CRUD機能
- クラスCRUD機能
- カテゴリーCRUD機能
- 会員CRUD機能
- お知らせCRUD
- プレミアム会員機能
* CRUDとは「生成」「読み取り」「更新」「削除」機能のこと

## 使用技術

■言語<br>
PHP7.2 | JavaScript  | HTML/CSS

■フレームワーク・ライブラリ等<br>
Laravel6.1 | jQuery | ApexCharts(チャート用) | Bootstrap

■RDB<br>
MySQL5.7

■AWS<br>
ECS | VPC | S3 | EC2 | ELB | IAM | RDS | Route53
[参考](https://qiita.com/okoppe8/items/dc1de147a36797442e4c)

■その他<br>
Docker | Nginx | GitHub | CircleCI

## Git flow

|ブランチ名 |概要 |
|---|---|
|master |デプロイ用ブランチ |
|release |確認用ブランチ |
|develop |開発用ブランチ |
|feature |機能別開発用ブランチ |

|No. |ルール |
|---|---|
|1. |masterは常にデプロイ可能である。 |
|2. |developはreleaseで動作確認してからmasterにマージする。 |
|3. |masterにマージ後デプロイを行う。 |
|4. |master以外のブランチの命名規則。<br>「ブランンチ名/日付/内容」|
|5. |コミットの命名規則。<br>[タイトル]概要<br><br>内容|

## DB設計

■ER図

![ER図](https://user-images.githubusercontent.com/29622529/80296369-644fc080-87b5-11ea-948c-41104d2222ab.jpg)

■DB定義書

https://docs.google.com/spreadsheets/d/1wt3V8w0pTHa2evWwitPKhLXX5lrj0CnDgDHrJkFX_ks/edit?usp=sharing

### 機能一覧

- 会員機能
  - 管理画面
    - 管理者の編集機能
    - 出席管理会員の編集機能
    - 一般会員の追加・編集・削除機能
      - 種別カテゴリー
  - 会員画面・管理画面
    - 一般会員の検索機能
    - 一覧・詳細表示
    - ログイン
    - パスワード再発行
- 種別カテゴリー機能
  - 種別の追加・編集・削除機能
  - 一覧・詳細表示
- クラス機能
  - 管理画面
    - 追加・編集・削除機能
  - 会員画面・管理画面
    - 一覧・詳細表示
    - 検索
- 出席機能
  - 会員画面
    - 一覧表示
    - 追加・編集・削除機能
    - 一括追加
    - 一括削除
    - ランキング
      - 一覧(全体)
        -  種別
        - 年別
        - 月別
      - 詳細(個別)
        - 年別出席数・平均
        - 月別出席数・平均
    - 検索
- 決済機能
  - 管理画面
    - 月額追加
    - カード情報変更
    - 解約
