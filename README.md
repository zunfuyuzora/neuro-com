# Environment

## Preparation

1. Git clone https://github.com/zunkazaragi/neuro-com.
2. Run `composer update` and wait until finish.
3. Copy `/.env.example` and paste with name `/.env`.
4. Edit `.env` file with preferred database and access. Make sure you had run `CREATE DATABASE [db_name]` manually from database server.
5. Run `php artisan key:generate` to generate Laravel Key.

## For Storage Link
**Storage Link** is a symlink that connect public access file `public\storage` to *ignored by git* folder `storage\app\public`. It prevents unnecessary file in storage for being uploaded to Git Repository. Configuration file at `\config\filesystems.php`
1. Simply run `php artisan storage:link`.

## Database Migration & Seeding
**Migration** is a Database Scheme that created automatically from Laravel Artisan Migrate. While **Seed** insert developer-defined record in `\database\seeds`
1. Run `php artisan migrate`
2. Run `php artisan db:seed`
**Default Account** for authorization/login:
1. username: admin | password: admin
2. username: akane123 | password: akane123
3. username: alexa123 | password: alexa123

# Serving the Apps on server

## Running the server 
* Simply run `php artisan serve` for access with `http://localhost:8000`. 
* If you want to get access from Server IP Address, run `php artisan serve --host 0.0.0.0 --port 8000`.

## Running websocket
Using Ratchet for **Websocket** and it should be run while `artisan serve` running. Websocket used for handling Chatting Feature. Simply run by open new command line and run `php artisan websocket:init`
