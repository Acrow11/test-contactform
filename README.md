お問い合わせフォーム

##Dockerビルド
1. git clone リンク
2. docker-compose up -d --build

## 環境構
1.docker-compose exec php bash
2.composer install
3..env.exampleファイルから.envを作成し、環境変数を変更
4.php artisan key:generate
5.php artisan migrate
6.php artisan db:seed


## 使用技術(実行環境)
- 例: Laravel 8.x, PHP, MySQLなど

## ER図


## URL
- 開発環境：http://localhost/
- phpMyAdmin : http://localhost:8080
