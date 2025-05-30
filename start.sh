#!/bin/bash

# Clear & cache config
php artisan config:clear
php artisan config:cache

# Migrate dan seed
php artisan migrate --force
php artisan db:seed --force || true

# Start Apache (penting: pakai exec!)
exec apache2-foreground