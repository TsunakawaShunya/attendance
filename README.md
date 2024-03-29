# アプリケーション名

WORKTIME

## 概要

勤怠管理アプリケーションで，出勤退勤の管理や勤務状況のログをユーザーごとに表示する．

## 使用している主な技術

- バックエンドフレームワーク
  <img src="https://img.shields.io/badge/-Laravel-E74430.svg?logo=laravel&style=plastic">
- フロンドエンド言語
  <img src="https://img.shields.io/badge/-Javascript-F7DF1E.svg?logo=javascript&style=plastic">
- バックエンド言語
  <img src="https://img.shields.io/badge/-Php-777BB4.svg?logo=php&style=plastic">
- データベース
  <img src="https://img.shields.io/badge/-Mysql-4479A1.svg?logo=mysql&style=plastic">
- インフラ
  <img src="https://img.shields.io/badge/-Amazon%20aws-232F3E.svg?logo=amazon-aws&style=plastic">

## ディレクトリ構成
laravelによる構成が基本となっている．
- マイグレーションファイル /attendance/database/migrations
- モデル /attendance/app/Models
- コントローラー /attendance/app/Http/Controllers
- ビュー /attendance/resources/views
- ルーティング /attendance/routes/web.php

## 使い方
ログイン後，トップページで出勤ボタンを押すことで出勤してください．退勤や休憩の際にはそのボタンを押してください．
出勤ログでは，勤務状況を確認することができます．

## 工夫した点
既存の給与システム等に適応できるために，データベースで勤務ログを管理できるようにした．

## テストユーザー
- ユーザー名　test1
- メールアドレス　test1@mail.com
- パスワード　test1test1
- 時給 1000円
- 月給 0円
