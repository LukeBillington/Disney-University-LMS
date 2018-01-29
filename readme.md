# Disney University LMS
This is a private proof-of-concept application for providing course creation,
where quizzes may be administer to gain a content retention benchmark.

## Technologies
+ **Laravel 5.5** (LTS, bug fixes: ~08/2019, security: ~08/2020)

## Setup
Please make sure your environment meets the following requirements and has the
proper dependencies installed.

### Server requirements (LAMP)
+ Apache or Nginx [(Pretty URL requirements)](https://laravel.com/docs/5.5/installation#web-server-configuration)
+ SQL Server, database and table with all access.
+ PHP >= 7.0.0
+ OpenSSL PHP Extension
+ PDO PHP Extension
+ Mbstring PHP Extension
+ Tokenizer PHP Extension
+ XML PHP Extension

### Dependencies
+ [Composer](https://getcomposer.org/)

### Installation
1. Clone the repository into your environment, and ensure you're in the working
directory.
2. Run `composer install`.
3. Copy `.env.example` to `.env`.
4. Configure environment options in the `.env` file to correspond to the
LAMP environment setup.
5. Run `php artisan key:generate` to generate a unique application security key.
6. Run `php artisan migrate` to perform database structure migrations.
