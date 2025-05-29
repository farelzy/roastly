#!/bin/bash

echo "🛠️ Starting Laravel in Docker..."

# Cek apakah .env sudah ada
if [ ! -f .env ]; then
    echo "📄 Copying .env.example to .env"
    cp .env.example .env
fi

# Install dependensi
echo "📦 Installing Composer dependencies..."
composer install --no-interaction --prefer-dist --optimize-autoloader

# Generate app key
echo "🔑 Generating app key..."
php artisan key:generate

# Jalankan migrasi dan seed (bisa hapus --force jika tidak butuh)
echo "📂 Running migrations and seeding..."
php artisan migrate --force
php artisan db:seed --force

# Jalankan Apache
echo "🚀 Starting Apache..."
apache2-foreground