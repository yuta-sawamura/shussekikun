# SHUSSEKIKUNとは

SHUSSEKIKUN(しゅっせきくん)は、店舗オーナーが会員の出席を管理できるWebシステムです。<br/>
会員は店舗に置かれた端末(PC、タブレット、スマートフォン)から、共通アカウントを用いて出席します。店舗オーナーは管理者アカントを用いて会員の出席情報を集計・閲覧できます。

## デザイン

<img width="1406" alt="スクリーンショット 2020-04-27 22 48 39" src="https://user-images.githubusercontent.com/29622529/80379657-58f5b580-88d9-11ea-843a-f15f211896f4.png">

[デザインのURL](https://yuuta1988.github.io/shussekikun-design/index.html)

## 作成の背景
私は以前、責任者として空手道場を運営していました。道場生の出席を紙ベースで管理しており、集計に苦労した経験があります。そんな背景から店舗オーナーは、特別な機材を導入することなく出席の管理ができ、会員は子どもでも直感的に出席できるWebシステムを作成することにしました。

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

## 機能一覧

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

## DB設計

■ER図

![ER図](https://user-images.githubusercontent.com/29622529/86187780-9562bd80-bb77-11ea-8eb8-3477a4a1ddc3.jpg)

■DB定義書

https://docs.google.com/spreadsheets/d/1wt3V8w0pTHa2evWwitPKhLXX5lrj0CnDgDHrJkFX_ks/edit?usp=sharing

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
