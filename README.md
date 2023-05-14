## Laravel 8 News Blog

This is a News Blog project built with Laravel 8. It allows users to read, create, edit, and delete posts, as well as add and remove tags to posts. Users can also leave comments on posts. The project includes authentication, with users able to register, log in, and log out.

## Team Members

Gursimar Singh Ply (D00251867) <br>
Lee Ze Jee 

## Technologies used
Laravel 8 <img src="https://laravel.com/assets/img/components/logo-laravel.svg" alt="Laravel logo" width="40" height="40"> <br>
MySQL <img src="https://www.mysql.com/common/logos/logo-mysql-170x115.png" alt="MySQL logo" width="40" height="40"> <br>
Tailwind CSS <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTq0F6HGBOunbnCsh585o99GCZnUA7hKef7ouZxiRyO&s" alt="Tailwind CSS logo" width="40" height="40"> <br>
Flowbite <img src="https://skeleton.ghost.io/content/images/2023/01/blog-tailwind.jpg" alt="Flowbite logo" width="40" height="40">
<br>

## Requirements
•	PHP 7.3 or higher <br>
•	Node 12.13.0 or higher <br>

## Description
This is a News Blog project built with Laravel 8, MySQL, Tailwind CSS, and Flowbite. It allows two types of users: admins and regular users. Admins have the ability to create, read, update, and delete posts, as well as manage tags and comments. Regular users can read and comment on posts, but cannot create or edit them.
## Usage <br>
Setting up your development environment on your local machine: <br>
```
git clone git@github.com:gursimar03/PHP_Blog.git
cd PHP_Blog
cp .env.example .env
composer install
php artisan key:generate
php artisan cache:clear && php artisan config:clear

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

Migrate the tables and populate it
```
php artisan migrate
php artisan db:seed
```


Everything Should be ready to go. 
Use the command below to start the application

```
php artisan serve
```
