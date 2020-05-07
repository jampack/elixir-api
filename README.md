## Dev Setup

- Run `composer install`
- Rename `.env.example` to `.env`
- Execute `php artisan key:generate`
- Create database (skip this if already exist)

__Example (MySQL/MariaDB/PostgreSQL)__
> create database elixir

- Configure settings in `.env`

__Example__
<blockquote>

    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=elixir
    DB_USERNAME=postgres
    DB_PASSWORD=p@ssw0rd

</blockquote>

- Execute `php artisan migrate` or `php artisan migrate:refresh` if tables already exist 
- Execute `php artisan db:seed`
- Execute `php artisan passport:install` to generate encryption keys and necessary clients __OR__ run `php artisan passport:client --password` if encryption keys already exist. Copy 'password grant' *Client ID* & *Client Secret* to `.env`

__Example__
<blockquote>

    PASSPORT_PASSWORD_GRANT_CLIENT_ID=2
    PASSPORT_PASSWORD_GRANT_CLIENT_SECRET=718MQExgMeeran7cmzAzEDmRue8RAhor8uzl6Yta

</blockquote>

__Note__: In case something goes wrong after following all these steps try executing
> php artisan init:dev

this will reset database and can be executed after making changes in migration/seeders for resetting data.

- __To start development server execute `php artisan server`__
- __GraphQL IDE can be browsed on http://localhost:8000/graphql-playground__
- __There is a built in log viewer that can be browsed on http://localhost:8000/logs when in development mode__

#### Automagically fix weird problems
1) `composer dump-autoload`
2) `php artisan cache:clear`
3) `php artisan config-clear`
4) `php artisan lighthouse:clear-cache`
