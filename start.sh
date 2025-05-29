#!/bin/bash

# Jalankan migration dan seed
composer install --no-interaction --prefer-dist --optimize-autoloader

php artisan config:clear
php artisan config:cache

php artisan migrate --force
php artisan db:seed --force

# Start apache
apache2-foreground