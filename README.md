<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Ingenia Agency Test

This is a test for the Ingenia Agency with the framework Laravel. Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. 

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Setup instructions for install

### Dependencies
    1. Mysql
    2. PHP 7.x.x
    3. Composer
    4. Node with NPM V6^

### Install
```
    1. git clone https://github.com/isaacBats/ingenia_test.git
    2. cd ingenia_test
    3. composer install
    4. config .env file [database environments, local environments]
    5. If you have a copy of the database, create the database and run the restore.
     5.1. Else eject php artisan migrate
```

If you don't have a user to login to the system, you can create one with the laravel tinker toolkit
```php
> php artisan tinker
use App\User;
    $admin = User::create(['name' => 'admin', 'email' => 'email@example.com', 'password' => bcrypt('your password')]);
```

### Running the app
```
    1. php artisan serve
    2. Open http://localhost:8000/ in your web browser
```
## Support

- **[Isaac Daniel Batista](https://danielbat.com/)**
- **[Linkeding Isaac](https://www.linkedin.com/in/isaac-daniel-batista/)**
- <daniel@danielvat.com>
