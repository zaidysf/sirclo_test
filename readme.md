# Sirclo Test

## Installation

##### Since i uses _laravel_ as the main framework, please refer to installation instruction below.

We need composer to install all packages.
Here the complete instruction to install composer https://getcomposer.org/doc/00-intro.md

First, heading to your sirclo test directory, e.g

```
cd sirclo_directory
```

Install all packages, by running this command from Terminal

```
composer install
```

Copy environment configuration example and create one of yours

```
cp .env.example .env
```

Generate key for security reason by execute command below

```
php artisan key:generate
```

Edit some values in `.env`, e.g

    DB_HOST=[YOUR_DB_HOST]
    DB_PORT=[YOUR_DB_PORT]
    DB_DATABASE=[YOUR_DB_NAME]
    DB_USERNAME=[YOUR_DB_USERNAME]
    DB_PASSWORD=[YOUR_DB_PASSWORD]

Then do some migration.

```
php artisan migrate
```

And run the web server

```
php artisan serve
```

Now, visit http://localhost:8000 to try the demo.

## Guide for Sirclo Testing Team 

There are 3 tasks which i get from email, I will describe it one by one of how to get my result.

#### 1. Fivaa
**Link task : **

`https://gist.github.com/nigorice/fc8790b5d3935861dba0ad69fbc3baf3`

**How to get the result :**

    // Go to your sirclo directory
    cd sirclo_directory 
    // Go to fivaa directory
    cd _fivaa
    // Run the web server
    php -S localhost:1234

    // Go to http://localhost:1234 in your browser

#### 2. Cart
**Link task : **

`https://gist.github.com/nigorice/a1aebd5b7ac599c9db36ed222ea59e4c`

**How to get the result :**

Open 2 terminal window and follow command below with using the first terminal window

    // Go to your sirclo directory
    cd sirclo_directory 
    // Run the web server
    php artisan serve

follow command below with using the second terminal window

    // To run the Unit Test, execute command below
    vendor/bin/phpunit tests/Unit/CartTest.php

    /* 
       To see the result of the implementation,
       Go to http://localhost:8000/cart in your browser
    */
    
#### 3. Weight Logging App Exercise
**Link task : **

`https://gist.github.com/nigorice/e8cee4fe237ba9cf250e3ce1d294e3b8`

**How to get the result :**

Open 2 terminal window and follow command below with using the first terminal window

    // Go to your sirclo directory
    cd sirclo_directory 
    // Run the web server
    php artisan serve

follow command below with using the second terminal window

    // Go to your sirclo directory
    cd sirclo_directory

    // To run the Unit Test, execute command below
    vendor/bin/phpunit tests/Unit/WeightLogCRUDTest.php

    
    // To see the result of the implementation, execute command below
    php artisan migrate

    // And go to http://localhost:8000/weight-log in your browser
    

## THANK YOU
This repository is used for the initial test of `SIRCLO (PT Lingkar Niaga Solusindo)` and made by `Muhammad Zaid Taufiq Yasyaf | akusukaprogram@gmail.com`

