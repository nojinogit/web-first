# web-first

勤怠管理システム『atte』
https://github.com/nojinogit/web-first/issues/1#issue-1723901062

#作成の目的
勤怠管理による人事評価のため

#アプリケーション URL
ログインページ　http://43.207.84.157/login
Mailhog‥パスワードリセットメールテストページ　http://43.207.84.157:8025/
phpMyAdmin‥データベース確認ページ　http://43.207.84.157:8080/

#機能一覧
ユーザー新規登録ページ表示/
ユーザー新規登録処理/
ユーザーログイン処理/
ユーザーログアウト処理/
打刻ページ表示処理/
日付別勤怠ページ表示処理/
日付別勤怠表示処理/
勤務時間開始登録処理/
勤務時間終了登録処理/
休憩時間開始登録処理/
休憩時間終了登録処理/
ユーザー別勤怠ページ表示処理/
ユーザー別勤怠検索処理/
ユーザー一覧ページ表示処理/
ユーザー検索処理/
パスワードリセットメール送信処理/
パスワードリセット処理/

#使用技術
nginx:1.21.1/
php:/
mysql:mysql:8.0.26/
phpmyadmin:/
mailhog
laravel:8.x/
jquery:3.4.1/

#テーブル設計
https://github.com/nojinogit/web-first/issues/2#issue-1723923432

#ER 図
https://github.com/nojinogit/web-first/issues/3#issue-1723929838

#環境構築
・.env.example をコピーし.env を作成/
・.env の DB_HOST=mysql,DB_DATABASE=laravel_db,DB_USERNAME=laravel_user,DB_PASSWORD=laravel_pass に変更/
・docker-compose.yml の存在するディレクトリにて「docker-compose up -d --build」/
・php コンテナに入る「docker-compose exec php bash」/
・コンポーザのアップデート「composer update」/
・APP_KEY の作成「php artisan key:generate」/
・テーブルの作成「php artisan migrate:fresh」※私の環境では「fresh」をつけないと git hub からクローンしたプロジェクトではテーブルを作成できませんでした/
以上でアプリ使用可能です「localhost/」にてログインページ開きます/

##備考
・「php artisan db:seed」にて 99 人分のユーザーデータ、当日の勤務時間・休憩時間のダミーデータが作成できます
