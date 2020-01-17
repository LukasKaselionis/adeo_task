# Adeo Web task

Simple product catalog application with basic management and price calculation capabilities.

## Requirements

- PHP ***>= 7.****

## Development run
- Clone repository.
- Run `composer install` command.
- Create MySQL database and login credentials to it.
- Run `cp .env.example .env` command.
- Run `php artisan key:generate` command.
- Fill `db` credentials on `.env` file.
- Run `php artisan migrate` command.
- Run `php artisan storage:link` command.

P.S.: if you don't use virtual machine, run `php artisan serve` command to run virtual server.