#!/bin/bash

echo "🛠️ Starting Laravel in Docker..."

if [ ! -f .env ]; then
    echo "📄 Copying .env.example to .env"
    cp .env.example .env
fi

composer install --no-interaction --prefer-dist --optimize-autoloader

php artisan key:generate

php artisan migrate --force
php artisan db:seed --force

apache2-foreground