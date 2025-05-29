#!/bin/bash

composer install --no-interaction --prefer-dist --optimize-autoloader

php artisan config:clear
php artisan config:cache

php artisan migrate --force
php artisan db:seed --force

apache2-foreground