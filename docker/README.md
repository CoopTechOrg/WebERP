# Laravel環境構築

## 環境変数について
環境変数の利用には`.env`ファイルが必要です。

リポジトリの`.env.example`をコピーして該当ファイルを作成してください。

## Build & Up
docker-compose up -d --build  

※M1Macの方はこちら↓  
docker-compose -f docker-compose.m1.yml up -d --build  

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
```php
mix.js('resources/js/app.js', 'public/js').vue()  
    .postCss('resources/css/app.css', 'public/css', [  
        require('postcss-import'),  
        require('tailwindcss'),  
    ])
    .webpackConfig(require('./webpack.config'))  
    .ts('resources/**/*', 'public/js/app.js'); //　<- 追記  
```

