
## Online Demo: 


## Useful commands
- init DB: `./init-db.sh`


## Name of your chosen PHP framework and why.

Framework: Laravel

Why choose Laravel, beacuse:
1. Laravel is a beautiful MVC framework.
2. Laravel has many build-in functions such as file storage, pagination etc. 
3. It help write beautiful and clean code.
4. Laravel speed up development.

## Steps needed to setup the solution and dependencies.

### Option 1: Run localhost with customized env
-  Copy the config file from .env.example `cp -r .env.example  .env`, then update the database configuration.
-  run `composer install`
-  Link the file storage: `php artisan storage:link`
-  migrate the data: `php artisan migrate`
-  run server: `php artisan serve`


### Option 2: Run localhost with sqlite3 and .env.testing
```
composer install
rm -r database/database.sqlite
touch database/database.sqlite
php artisan storage:link
php artisan migrate --env=testing
php artisan serve --port=8999 --host=127.0.0.1 --env=testing

```
or simply run `./run-server.sh`

## Steps needed to run the test suite.

Run unit test with testing env
```
composer install
php artisan storage:link
rm -r database/database.sqlite
touch database/database.sqlite
php artisan migrate --env=testing
./vendor/bin/phpunit
```
or simply run `./run-unit-test.sh`

## Time taken to complete the test.

7 hrs.

## Any compromises/shortcuts you made due to time considerations.
 - Free UI: Saving time on writing UI.

    https://www.creative-tim.com/product/material-dashboard
 - Column-Sortable: https://github.com/Kyslik/column-sortable 
,Package for handling column sorting in Laravel 5.7

    By using this package, the task of the column sorting was completed in 10 mins.
- Laravel, simple and fast MVC framework.
