# 概要
案件管理 WebERP作るよ

# 技術スタック
- Laravel8
  - DDD採用予定
- Vue3 + ts (laravel-mix)
- DevOps(Docker) 非必須, plantUML 必須(設計ファイル見れなくても良い人はなくてもいいけど推奨)
- CI/CD
- AWS(s3, ECS)
- css(sass)

# ERPとは？
## WebERP参考サイト
[grandit](https://www.grandit.jp)

# 開発手法
- アジャイル
  - ウォーターフォールほどでもないかな。

# Git

## 保護設定
[参考サイト](https://qiita.com/da-sugi/items/ba3cd83e64c689795c50)

## ブランチルール
以下を参考に、作業ブランチから親ブランチへPR(Pull Request)投げてください

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


# Laravel環境構築
M1Macの方はMySQLのDockerfileを、下記に書き換えて下さい。
FROM --platform=linux/x86_64 mysql:8.0

## Build & Up
docker-compose up -d --build

## コンテナ起動状態を確認
docker-compose ps
コンテナが3つ立ち上がっていればOK

## Package Install
appコンテナに入る
docker-compose exec app bash

## Laravelプロジェクト作成
composer create-project --prefer-dist laravel/laravel . "8.x"

## jetstream:interiajsインストール
composer require laravel/jetstream
php artisan jetstream:install inertia
npm install
npm run dev
php artisan migrate

## TSインストール
npm install -g typescript

バージョンが表示されればOK
tsc --version

TS設定用ファイル作成
tsc --init

## Laravel Mix(webpack.mix.js)の設定
.ts('resources/**/*', 'public/js/app.js');　<- 追記