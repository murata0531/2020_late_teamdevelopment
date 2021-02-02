araelチーム用

2020後期

___________________________________________________

使用環境

Laravel8 + React + firebase

___________________________________________________

構築

cp .env.example .env


php artisan key:generate

composer install

npm install


firebase apiキー各自取得

resources/views/home.blade.php内の「firebaseconfig=」の中に貼り付ける

___________________________________________________

デバッグ用

データベースを再設計

php artisan migrate:fresh

データベースにテストデータを作成

php artisan db:seed
