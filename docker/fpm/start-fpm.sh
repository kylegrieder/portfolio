#!/usr/bin/env sh

touch /app/storage/logs/laravel.log && tail -f /app/storage/logs/laravel.log &
touch /var/log/php-fpm.log && tail -f /var/log/php-fpm.log &
touch /var/log/php_error.log && tail -f /var/log/php_error.log &

php-fpm -R
