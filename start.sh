#!/bin/bash

# Install dependency
composer install --no-interaction --prefer-dist --optimize-autoloader

# Laravel config
php artisan config:clear
php artisan config:cache

# Migrate dan seeding pakai --force
php artisan migrate --force
php artisan db:seed --force

# Start apache
apache2-foreground