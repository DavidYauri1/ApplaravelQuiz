## LaraQuiz

This is a custom-built Laravel system that you can use to launch your own quiz/trivia portal, or just learn from our Laravel + Livewire code.

This readme file will contain the requirements/installation, you can [read full documentation on this page](https://povilaskorop.gitbook.io/laraquiz/).


## Requirements

LaraQuiz is a project built with Laravel 8, so the requirements come from that framework.

The main requirements are:

- PHP 7.4+
- MySQL 5.7+

All the other requirements on PHP libraries can be found in the [official Laravel documentation](https://laravel.com/docs/8.x/deployment#server-requirements).


## Installation

- Clone the repository into the folder you want
- Run `cp .env.example .env` file to copy example file to `.env`
- Edit your `.env` file with DB credentials and other settings if you wish to change them
- Run `composer install` command
- Run `php artisan migrate --seed` command (seed is important: it will create the first admin user for you)
- Run `php artisan key:generate` command
- If you want to seed three demo quizzes, run `php artisan quizzes:seed` command

And that's it, go to your domain to see the homepage. 

You can log in as administrator: 

- Email `admin@admin.com`
- Password `password`

