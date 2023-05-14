# 学校用災害掲示板

学校をターゲットとした災害時連絡掲示板です。
一般の掲示板と違い、クラス・学籍番号の項目を作成しました。
また、メッセージと場所を書き込むことで、学生の安否情報を一目で分かります。
そして、絞り込み機能もあるため、クラス別や危険状態の生徒などすぐに確認出来ます。
これにより、安否確認の効率化を図ることが出来ます。

## 技術スタック

![Laravel](https://img.shields.io/badge/Laravel-v8.0-orange)
![MySQL](https://img.shields.io/badge/MySQL-v8.0-blue)
![Git](https://img.shields.io/badge/Git-v2.33.0-red)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-v3.0.5-blueviolet)
![GitHub](https://img.shields.io/badge/GitHub--black?logo=GitHub)

## インストール

1. リポジトリをクローンする: `git clone https://github.com/T-Be-D/SafetyConfirmationService.git`
2. 必要なパッケージをインストールする: `composer install && npm install`
3. .env.example ファイルを.env にコピーして、データベースの認証情報を更新する
4. MySQL は autocommit (自動コミットモード)を無効化する方は　 autocommit を設定してください。
5. アプリケーションキーを生成する: `php artisan key:generate`
6. データベースマイグレーションを実行する: `php artisan migrate`
7. 開発用サーバーを起動する: `php artisan serve`,`npm run dev`
