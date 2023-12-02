# Laravel Website

Effortless restaurant management and customer ordering with a simple Laravel site. Secure and explore Dark Mode for a comfortable browsing experience.

![Image](https://github.com/repiyann/Laravel-PTI/assets/92260886/7b94cb9e-99e9-4ca3-86c0-999c76893ef4)

## Description

Created to fulfill the mid-semester exam assignment for the Application of Internet Technology course.

### Build With

* [Laravel](https://laravel.com/)
* [TailwindCSS](https://tailwindcss.com/)
* [Laravel Breeze](https://laravel.com/docs/10.x/starter-kits)
* [Font Awesome](https://fontawesome.com/)
  
# Getting Started

## Dependencies

You need to use Composer and npm to install any depedencies like Laravel and TailwindCSS.

You could go to [Composer](https://getcomposer.org/) and [npm](https://www.npmjs.com/) sites for proper installation.

## Installation

1. Install Composer dependencies `composer install`
2. Install npm dependencies `npm install`
3. Create a copy of your .env file `cp .env.example .env`
4. Generate an app encryption key `php artisan key:generate`
5. Create an empty database.
6. In the .env file, add database information to allow Laravel to connect to the database.
7. In the .env file, add mailer information to allow Laravel to send email verification. In this case, you could use [Mailtrap](https://mailtrap.io/)
8. Migrate the database `php artisan migrate`
9. Seed the database `php artisan db:seed`

## Executing Program

1. Run Laravel `php artisan serve`
2. Run TailwindCSS `npm run dev`
3. Open http://localhost:8000 with your browser to see the result.

### Existing Accounts

The database already contains a sample account to test things out with. Use that or head over to the signup page and start making new accounts.

```
      Username      | Password |
-------------------------------|
admin@example.com   | 111      |
user@example.com    | 111      |
```

# Author

10121194 - Muhamad Repiyan Riski - IF 5
* GitHub: [@repiyann](https://github.com/repiyann)
* Instagram: [@repiyann](https://instagram.com/repiyann)
