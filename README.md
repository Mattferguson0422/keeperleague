# keeperleague

The start of fantasy draft software.

Dependencies
- PHP >= 5.6.4
- [Composer](https://getcomposer.org/Composer)
- [Node](https://nodejs.org/en/download/)

More info for installation of this version
[Laravel 5.4](https://laravel.com/docs/5.4)

Recommended for Database
[mySQL](https://www.mysql.com/)
- If used create a database named 'keeper_league'

###After Cloning Project...
- Copy .env.example file into .env within root of the project.
- If database credentials differ, change credentials within .env file.
- More on Database Configurations [here](https://laravel.com/docs/5.4/database#configuration)

###From Command Line

Within root of project run the following...
- <code>composer install</code>
- <code>npm install</code>
- <code>php artisan key:generate</code>
- <code>php artisan migrate</code> // To create needed tables in database
- <code>php artisan serve</code> // To open an instance of a server
- Go to [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.