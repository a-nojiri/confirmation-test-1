# お問い合わせホーム
ｰｰｰ
## 環境構築
ｰｰｰ
### Dockerビルド
```bash
  1.リポジトリをクローン:
     ```bash
 　　git clone https://github.com/a-nojiri/confirmation-test-1.git
　　cd confirmation-test-1
  2.Dockerを起動：
    ```bash
    docker-compose up -d --build

＊MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集して下さい。

### Laravel構築
```bash
 1.docker-compose exec php bash
 2.composer install
 3.cp .env.example .env
 4.php artisan key:generate
 5.php artisan migrate
 6.php artisan db:seed
 ｰｰｰ
## 使用技術(実行環境)
```bash
  ･PHP 8.0
　･Laravel 8.x
　･MySQL 8.0
　･Docker
　･Nginx
　ｰｰｰ
 ## ER図
　![ER図](./er.png)
ｰｰｰ
## URL
```bash
　･開発環境： http://localhost
　･phpMyAdmin（http://localhost:8080）
