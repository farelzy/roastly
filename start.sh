#!/bin/bash

# Jalankan migration dan seed
composer install --no-interaction --prefer-dist --optimize-autoloader

php artisan config:clear
php artisan config:cache

php artisan migrate
php artisan db:seed

# Start apache
apache2-foreground