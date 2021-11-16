# 概要

案件管理 WebERP 作るよ

# 技術スタック

- Laravel8
  - DDD 採用予定
- Vue3 + ts (laravel-mix)
- DevOps(Docker) 非必須, plantUML 必須(設計ファイル見れなくても良い人はなくてもいいけど推奨)
- CI/CD
- AWS(s3, ECS)
- css(sass)

# ERP とは？

## WebERP 参考サイト

[grandit](https://www.grandit.jp)

# 開発手法

- アジャイル
  - ウォーターフォールほどでもないかな。

# Git

## 保護設定

[参考サイト](https://qiita.com/da-sugi/items/ba3cd83e64c689795c50)

## ブランチルール

以下を参考に、作業ブランチから親ブランチへ PR(Pull Request)投げてください

## 開発

### 親ブランチ

`develop`ブランチ

### 作業ブランチ

`feature/***`ブランチ

## アイデア

### 親ブランチ

`idea`ブランチ

### 作業ブランチ

`idea-feature/***`ブランチ

## 設計

### 親ブランチ

`system_design`ブランチ

### 作業ブランチ

`system_design-feature/***`ブランチ

# 環境構築

docker-compose を使っている方は docker compose ではなく docker-compose のコマンドを使用してください。

1. ファイルの所有者を変更

```
sudo chown -R root:root src docker docker-compose.yml
```

2. docker image の作成

```
docker compose build
```

3. docker コンテナの起動と web-erp-app コンテナへ入る

```
docker compose up -d
docker compose exec web-erp-app bash
```

4. laravel8 のインストールと storage ディレクトリの所有者変更

```
composer create-project --prefer-dist laravel/laravel . "8.x"
chown www-data storage/ -R
```

5. jetstream と interiajs のインストール

```
composer require laravel/jetstream
php artisan jetstream:install inertia
npm install
npm run dev
php artisan migrate
```
