<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
# Product Test

A simple Laravel application for product entry and display using JSON storage which includes routes, controller logic, and Bootstrap UI for adding and viewing products.

## Tech Stack
- **Laravel 10+**
- **PHP 8.2+** (via XAMPP)
- **Bootstrap 5**
- **JSON File Storage**
- **AJAX (jQuery)**

## Setup Instructions

### 1. Prerequisites
Before you start, make sure you have:
- **XAMPP** installed (Apache + PHP)
- **Composer** installed
- **Git** installed and configured
- **Laravel** installed (optional — handled via Composer)

---

### 2️. Start Apache & MySQL (XAMPP)
1. Open **XAMPP Control Panel**.
2. Start **Apache** (and MySQL if needed for other projects).
3. Make sure PHP version is visible by running:
   php -v

---

### 3. Clone the Repository
   git clone https://github.com/sandhya119/product-test.git
   cd product-test
   
---

### 4. Install Laravel Dependencies
   composer install
   
---

### 5. Run the Project
   php artisan serve
   Visit http://localhost:8000

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
### Fix: SQLite “Database file does not exist” Error

If you see an error like:
Database file at path [...] does not exist. Ensure this is an absolute path to the database.

### Follow these steps:

### 1. Check your .env file
Ensure it has the following settings:

### DB_CONNECTION=sqlite
### DB_DATABASE=/absolute/path/to/database/database.sqlite

Replace /absolute/path/to/database/database.sqlite with the full path to your **database.sqlite** file.

### 2. Create the SQLite file
Go to your project’s database folder (project-root/database/) and create an empty file named database.sqlite.

Windows: Right-click → New → Text File → rename it to database.sqlite.

### 3. Run migrations and start the server
From the project root, execute:
### php artisan migrate
### php artisan serve
After this, the error should be resolved.

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
### Dashboard
![Dashboard Screenshot](assets/screenshot-laravel)
