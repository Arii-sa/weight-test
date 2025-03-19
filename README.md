Pigly
環境構築

Dockerビルド
１. git clone git@github.comを差し替え
２.docker-compose up -d --buildで実行
Laravelパッケージのインストール
docker-compose exec php bash後、
１.docker-compose up -d --build
2.docker-compose up -d --build
3.envファイル作成
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laravel_db
    DB_USERNAME=laravel_user
    DB_PASSWORD=laravel_pass
４.laravel fortifyインストール

〜TABLE〜
---
usersテーブル
| カラム名 | 型 | PRIMARY KEY | NOT NULL | 補足 |
| --- | --- | --- | --- | --- |
| id | bigint unsigned | ◯ |  |  |
| name | varchar(255) |  | ◯ |  |
| email | varchar(255) |  | ◯ |  |
| password | varchar(255) |  | ◯ |  |
| created_at | timestamp |  |  |  |
| updated_at | timestamp |  |  |  |

weight_targetテーブル
| カラム名 | 型 | PRIMARY KEY | NOT NULL | FOREIGN KEY | 補足 |
| --- | --- | --- | --- | --- | --- |
| id | bigint unsigned | ◯ |  |  |  |
| user_id | bigint unsigned |  |  | ◯ |  |
| target_weight | decimal(4,1) |  | ◯ |  | 目標体重 |
| created_at | timestamp |  |  |  |  |
| updated_at | timestamp |  |  |  |  |

weight_logsテーブル
| カラム名 | 型 | PRIMARY KEY | NOT NULL | FOREIGN KEY | 補足 |
| --- | --- | --- | --- | --- | --- |
| id | bigint unsigned | ◯ |  |  |  |
| user_id | bigint unsigned |  |  | ◯ |  |
| date | date |  | ◯ |  | 日付 |
| weight | decimal(4,1) |  | ◯ |  | 体重 |
| calories | int |  |  |  | 食事量 |
| exercise_time | time |  |  |  | 運動時間 |
| exercise_content | text |  |  |  | 運動内容 |
| created_at | timestamp |  |  |  |  |
| updated_at | timestamp |  |  |  |  |
