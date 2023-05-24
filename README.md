# web-first

勤怠管理システム『atte』
<img width="1920" alt="login" src="https://github.com/nojinogit/web-first/assets/127584258/7c76dff4-e09f-4e6b-9eb5-33c8077e9ff4">

#作成の目的
勤怠管理による人事評価のため

#アプリケーション URL
ログインページ　http://43.207.84.157/login  
Mailhog‥パスワードリセットメールテストページ　http://43.207.84.157:8025/  
phpMyAdmin‥データベース確認ページ　http://43.207.84.157:8080/

#機能一覧
ユーザー新規登録ページ表示  
ユーザー新規登録処理  
ユーザーログイン処理  
ユーザーログアウト処理  
打刻ページ表示処理  
日付別勤怠ページ表示処理  
日付別勤怠表示処理  
勤務時間開始登録処理  
勤務時間終了登録処理  
休憩時間開始登録処理  
休憩時間終了登録処理  
ユーザー別勤怠ページ表示処理  
ユーザー別勤怠検索処理  
ユーザー一覧ページ表示処理  
ユーザー検索処理  
パスワードリセットメール送信処理  
パスワードリセット処理

#使用技術
nginx:1.21.1/
php:/
mysql:mysql:8.0.26/
phpmyadmin:/
mailhog
laravel:8.x/
jquery:3.4.1/

#テーブル設計
<img width="840" alt="tables" src="https://github.com/nojinogit/web-first/assets/127584258/e9546d8a-b665-4126-8784-dcb507102fe2">

#ER 図  
![ER](https://github.com/nojinogit/web-first/assets/127584258/19085f25-a088-48cd-b9f9-3aca4f2f38d0)

#環境構築  
・.env.example をコピーし.env を作成  
・.env の DB_HOST=mysql,DB_DATABASE=laravel_db,  
 DB_USERNAME=laravel_user,DB_PASSWORD=laravel_pass に変更  
・docker-compose.yml の存在するディレクトリにて「docker-compose up -d --build」  
・php コンテナに入る「docker-compose exec php bash」  
・コンポーザのアップデート「composer update」  
・APP_KEY の作成「php artisan key:generate」  
・テーブルの作成「php artisan migrate:fresh」※私の環境では「fresh」をつけないと git hub からクローンしたプロジェクトではテーブルを作成できませんでした  
以上でアプリ使用可能です「localhost/」にてログインページ開きます

##備考
・「php artisan db:seed」にて 99 人分のユーザーデータ、当日の勤務時間・休憩時間のダミーデータが作成できます
