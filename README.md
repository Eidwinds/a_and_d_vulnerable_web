# Vulnerable Server

## Required

- PHP 5.4
- MySQL
- composer
- compass

## Setup

create database user and database.
then modify fuel/app/config/db.php.

``` shell
$ git clone --recursive git@github.com:Eidwinds/a_and_d_vulnerable_web.git
$ composer install
$ php oil r migrate
```

## Using sample data
``` shell
$ mv sample/*.png public/assets/img/upload/
```

then use sample/sample.sql.

## Create Admin User

``` shell
$ php oil r user:createAdmin [email] [password]
```
