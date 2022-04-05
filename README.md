## 概要

案件管理 WebERP作るよ

## アサイン (敬称略)

### テスト

- ふな (https://github.com/funa074)
- たてりょ～ (https://github.com/Rywwwwwww)

### テスト実施手順(2022/02/03追記)

- ① appコンテナに入る
- ② php artisan test コマンドを叩き、テスト実施する
- ※②を実施した際、上手くいかなかった場合は、php artisan config:cache --env="testing" コマンドを一度叩き、その後、②を実施してください。

メモ：②のコマンドを叩くと、テストDBにユーザーデータが一つ作成され、下記のテスト動作を実施してくれます。

- ① ログイン処理を実施し、正しいパスワードを入力、ログイン成功させる
- ② ログイン処理を実施し、誤ったパスワードを入力、ログイン失敗させる
- ③ ①を実施後、ログアウト処理を行う

### デザイン(css)、画面描画部分

- 星宮 (https://github.com/hosimiya7)
- Shumpei (https://github.com/Shumpei0111)

### インフラDocker構築

- つむぎ (https://github.com/it-tsumugi)
- 坂口 (https://github.com/Zuzu0725)
- 星宮 (https://github.com/hosimiya7) (Windows要員)

### バックエンド

- たてりょ～ (https://github.com/Rywwwwwww)
- 星宮 (https://github.com/hosimiya7)
- 坂口 (https://github.com/Zuzu0725)

## 技術スタック

- Laravel8
    - DDD採用予定
- Vue3 + ts (laravel-mix)
- DevOps(Docker) 非必須, plantUML 必須(設計ファイル見れなくても良い人はなくてもいいけど推奨)
- CI/CD
- AWS(s3, ECS)
- css(sass)

## ERPとは？

### WebERP参考サイト

[grandit](https://www.grandit.jp)

## 開発手法

- アジャイル
    - ウォーターフォールほどでもないかな。

## Git

### 注意事項

必ず作業前・一日の初めなど着手するタイミングで最新状態pullしてください。

不要なコンフリクトの原因にもなるし、コミット量が多くなります。

### コマンド : (ブランチ名)

git pull origin develop : (develop) : developブランチの内容を最新にするためにpull

git checkout -b feature/#number : (develop) : numberには対応したissueの数字を入れる。ブランチを切り替える

作業 : (feature/#number) : 移動したブランチで作業

git push origin feature/#number : (feature/#number) : 作成したブランチからpushする

gihub側でプルリクを作成する(対応するissueのリンクをつける)

※同じブランチを使う可能性がある場合ブランチの削除

git branch -d feature/#number : (develop) : ローカルブランチから削除

git push --delete origin feature/#number : (develop) : リモートブランチから削除

### 保護設定

[参考サイト](https://qiita.com/da-sugi/items/ba3cd83e64c689795c50)

### ブランチルール

以下を参考に、作業ブランチから親ブランチへPR(Pull Request)投げてください

### 開発

#### 親ブランチ

`develop`ブランチ

#### 作業ブランチ

`feature/***`ブランチ

### アイデア

#### 親ブランチ

`idea`ブランチ

#### 作業ブランチ

`idea-feature/***`ブランチ

### 設計

#### 親ブランチ

`system_design`ブランチ

#### 作業ブランチ

`system_design-feature/***`ブランチ

### ドキュメント

#### 親ブランチ

`docs` ブランチ

#### 作業ブランチ

`docs-feature/***`

## コーディングルール

- PSRに則ってください。
- テーブルの列にenumは許可しません。
- マジックナンバーも許容しません。
- インデントは4スペースとします。
- 関数の型宣言必須とします。
- ControllerにValidateは禁止します。make:requestで作成されたRequestに設定してください。
- viewを返すアクションでredirectする際はExceptionを吐き、Exception内でreturnしてください。
- urlはケバブケースに統一します。
- Routingにnameは必須とします。
- DDDについては一度勉強会開きます :)
- Viewでphpdocを記載する場合は `@php` でなく `<?php` を用いたほうが整形がされます。お得。

## ide-helper コマンド

```
docker-compose exec app php artisan ide-helper:models -W -R
```

## ディレクトリ階層(DDD込み)

CommandServiceの中で、永続化させるモデルを生成するのがEntity

Entityによって生成されたモデルを永続化するのがRepository

QueryServiceが非永続化した情報を取得する処理をまとめる。実際に取得するのはRepository。

モデルを表示するだけならばモデルを返すが、複数のモデルと一緒に情報を表示する場合はDtoに集約して表示する

```
docker/                       Dockerコンテナ群
src/
   ├─ app/                    メインコード
   │   ├─ Console/
   │   │   └─ Commands/       コマンド (Laravel標準)
   │   │
   │   ├─ Core/               共通機能
   │   │
   │   ├─ Domain/             業務ドメイン(DDD)
   │   │   ├─ Entity/         エンティティ（集約）
   │   │   │   └─ Validator/  エンティティバリデーター
   │   │   ├─ Event/          ドメインイベント
   │   │   ├─ Service/        ドメインサービス
   │   │   └─ ValueObjects/   値オブジェクト（エンティティ用）
   │   │
   │   ├─ Exception/          例外
   │   │
   │   ├─ Http/
   │   │   ├─ Controllers/    Webコントローラ (Laravel標準)
   │   │   │
   │   │   ├─ Middleware/     ミドルウェア (Laravel標準)
   │   │   └─ Requests/       フォームバリデーション (Laravel標準)
   │   │
   │   ├─ Jobs/               ジョブ (Laravel標準)
   │   ├─ Listeners/          イベントリスナー (Laravel標準)
   │   │
   │   ├─ Models/             Eloquentモデル (Laravel標準)
   │   │   ├─ Event/          Eloquentイベント
   │   │   └─ Validator/      Eloquentモデルバリデーター
   │   │
   │   ├─ Providers/          サービスプロバイダ (Laravel標準)
   │   │
   │   ├─ Repositories/       リポジトリ
   │   │   └─ Domain/         業務ドメイン/エンティティ（集約） 用リポジトリ
   │   │
   │   ├─ Rules/              バリデーションルール (Laravel標準)
   │   │
   │   ├─ Services/           アプリケーションサービス
   │   │   ├─ Command/           永続化処理
   │   │   │   └─ Entity/        モデルを直接変更しないようにEntity経由
   │   │   └─ Query/             非永続化処理(return されるのはDTO)
   │   │       └─ DTO/           Data Transfer Object
   │   │
   │   ├─ ValueObjects/       値オブジェクト
   │   └─ View/               ビュー用のヘルパー
   │
   ├─ bootstrap               起動
   │
   ├─ config                  設定ファイル
   │
   ├─ database
   │   └─ migrations          マイグレーション
   │
   ├─ resources               ビュー、js、sass
   │
   ├─ routes                  ルーティング
   │
   └─ tests/                  テスト
       ├─ Browser             E2Eテスト (Laravel Dusk)
       ├─ Feature             機能テスト (Feature test)
       └─ Unit                単体テスト (Unit test)
```

## テストの懸念

### テストデータの取り扱い

RefreshDatabase trait を使っている場合、テストをするとDBがリフレッシュされる。  
テストデータが消えるという意味では問題ないが、テストデータ以外もRefreshされてしまう。  
開発データもRefreshされてしまうのは困るので、テスト用のDBを作るか？

`.env.testing`

### ファサードの利用

Unitテストは
`PHPUnit\Framework\TestCase`
ではなく
`Tests\TestCase`
をuseすること
