Requirements

mandatory endpoints: create, read, update, delete (feel free to extend these endpoints)
use an authentication method to secure your requests (Examples: JWT token, oAuth, etc.)
use a way to make your data persistent (database is preferred)
write at least one unit test and a functional test

Authentication : OAUTH 2.0

General Commands 

`php artisan passport:client --password`

`php -S localhost:8000 -t public`

`php artisan migrate:fresh --seed`

Testing [Unit / Functional]

`./vendor/bin/phpunit`

Make Db look into .env file and replace values below to your DB setup

`DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=phonebookapp
DB_USERNAME=root
DB_PASSWORD=`

Too start the project use `Make install` which runs makefile doing general setup-seeding for the project. Depending if you want to view or test output on postman for example you will need to one set up localhost server which my case was using default `php -S localhost:8000 -t public` which you also need use `php artisan passport:client --password` command to setup a user with token which default credentials are `'email' => 'admin@admin.com' 'passowrd' => 'admin'`. 

For testing all you need to do is run phpunit native command `./vendor/bin/phpunit`.   