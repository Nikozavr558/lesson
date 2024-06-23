#!/bin/sh
php artisan migrate --force
php artisan cache:clear
php artisan config:clear

php-fpm -y /usr/local/etc/php-fpm.conf -R
