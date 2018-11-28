
## Online Demo: http://brighte-technical-demo.holaapp.com.au/

### Run localhost
-  Copy the config file from .env.example `cp -r .env.example  .env`, then update the database configuration.
-  run `composer install`
-  Link the file storage: `php artisan storage:link`
-  migrate the data: `php artisan migrate`
-  run server: `php artisan serve`


### Run localhost with sqlite3 and .env.testing
```
composer install
rm -r database/database.sqlite
touch database/database.sqlite
php artisan storage:link
php artisan migrate --env=testing
php artisan serve --port=8999 --host=127.0.0.1 --env=testing

```
or run `./run-server.sh`


### PHP UNIT TEST: Run unit test with testing env
```
composer install
php artisan storage:link
rm -r database/database.sqlite
touch database/database.sqlite
php artisan migrate --env=testing
./vendor/bin/phpunit
```
or run `./run-unit-test.sh`
