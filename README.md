## Laravel Gambling Theme Blog

•	Author: Harris Teh Kai Ze <br>

## Requirements
•	PHP 7.3 or higher <br>
•	Node 12.13.0 or higher <br>

## Usage <br>
Setting up your development environment on your local machine: <br>
```
git clone https://github.com/harrist03/laravel-8-complete-blog.git
cd laravel-8-complete-blog
cp .env.example .env
composer install
php artisan key:generate
php artisan cache:clear && php artisan config:clear
php artisan serve
```

## Before starting <br>
Create a database <br>
```
mysql
create database laravelblog;
exit;
```

Setup your database credentials in the .env file <br>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelblog
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```

Migrate the tables
```
php artisan migrate
```

Migrate the seeders (get the test data)
```
php artisan migrate:fresh --seed
```

## Unqiue Features
A user dashboard that allows the user to manage posts (create, edit and delete).
View all your posts and analytics such as total posts, total views and total likes
See the top performing posts

A newsletter email system, which sends an email to the email-address you entered
powered By MailGun

You can also filter by most liked, most viewed, latest and oldest
You can also filter by categories (sports, strategies, etc.)
