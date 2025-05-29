FROM php:8.3-apache

# Install dependencies termasuk ext-intl
RUN apt-get update && apt-get install -y \
    git zip unzip curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    libicu-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Aktifkan Apache rewrite
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy semua file
COPY . /var/www/html
WORKDIR /var/www/html

# Atur permission
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Copy start.sh dan beri permission
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Jalankan start.sh saat container start
CMD ["/start.sh"]