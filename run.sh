
# run unit test
php artisan storage:link
rm -r database/database.sqlite
touch database/database.sqlite
php artisan migrate --env=testing
php artisan serve --port=8999 --host=127.0.0.1 --env=testing
./vendor/bin/phpunit


