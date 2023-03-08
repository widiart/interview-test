# interview-test
Tes Interview Web Developer 0603

## Requirement

- Mysql Database
- PHP 8.2
- Laravel 10

## Installation

Untuk instalasinya dapat menjalankan perintah dibawah secara berurutan :

```sh
composer install
php artisan migrate --seed
php artisan serve
```

Aplikasi dapat dibuka di

```sh
http://localhost:8000
```

## API

Untuk API get data semua user ada di :

```sh
GET http://localhost:8000/api/v1/user
```