# SHUSSEKIKUNとは

SHUSSEKIKUN(しゅっせきくん)はジムや習い事教室の店舗オーナーが、会員の出席を管理できるWebシステムです。

## 使用技術

■言語<br>
PHP | JavaScript  | HTML/CSS

■フレームワーク・ライブラリ等<br>
Laravel | jQuery | ApexCharts(チャート用) | Bootstrap

■RDB<br>
MySQL

■AWS<br>
ECS | VPC | S3 | EC2 | ELB | IAM | RDS | Route53
[参考](https://qiita.com/okoppe8/items/dc1de147a36797442e4c)

■その他<br>
Docker | GitHub | CircleCI

## フェーズ分け公開タイミング

|フェーズ |内容 |期日 |
|---|---|---|
|1 |デザイン公開 |4月15日 |
|2 |Laraveにデザイン乗せて公開 |6月7日 |
|3 |機能実装して公開 |7月15日 |
|4 |テスト |7月30日 |
|5 |「CircleCI」「ECS」を導入 |8月30日 |

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
