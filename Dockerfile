FROM php:8.2-apache

# Install dependencies untuk PHP dan Laravel
RUN apt-get update && apt-get install -y libpng-dev libzip-dev zip unzip libpq-dev
RUN docker-php-ext-install pdo_pgsql pdo_mysql

# Aktifkan rewrite mode untuk Laravel
RUN a2enmod rewrite

# Setup folder kerja
WORKDIR /var/www/html
COPY . .

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Permission folder
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Atur DocumentRoot ke folder public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Command saat container jalan: install dependensi, migrasi, lalu jalankan server
CMD composer install --no-dev --optimize-autoloader && \
    php artisan migrate --force && \
    apache2-foreground
