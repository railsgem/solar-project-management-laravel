
# run unit test
composer install
php artisan storage:link
rm -r database/database.sqlite
touch database/database.sqlite
php artisan migrate --env=testing
./vendor/bin/phpunit
