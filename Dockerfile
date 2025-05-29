# Gunakan PHP 8.3 + Apache
FROM php:8.3-apache

# Install ekstensi PHP yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git zip unzip curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy semua file ke dalam container
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Set permission
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Copy start.sh dan buat bisa dijalankan
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Jalankan start.sh saat container dijalankan
CMD ["/start.sh"]