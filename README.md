# Vulnerable Server

## Required

- PHP 5.5
- composer
- compass

## Setup

``` shell
$ git clone --recursive git@github.com:Eidwinds/a_and_d_vulnerable_web.git
$ composer install
$ php oil r migrate
```

## Using sample data
``` shell
$ mv sample/*.png public/img/upload/
```

then use sample/items.sql.

## Create Admin User

``` shell
$ php oil r user:createAdmin [email] [password]
```
