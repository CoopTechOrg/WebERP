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
