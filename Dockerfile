# Gunakan PHP 8.3 dengan Apache
FROM php:8.3-apache

# Install dependensi sistem dan ekstensi PHP
RUN apt-get update && apt-get install -y \
    git unzip zip curl \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql zip mbstring exif pcntl

# Install Composer (resmi dari image composer)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Salin source code Laravel ke direktori kerja
COPY . /var/www/html

# Set direktori kerja
WORKDIR /var/www/html

# Set permission agar Apache bisa akses
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Salin dan izinkan start.sh
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Jalankan Laravel pakai script
CMD ["sh", "/start.sh"]
