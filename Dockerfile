FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install project dependencies
RUN composer install && npm install && npm run build && php artisan key:generate

# Expose port
EXPOSE 10000

# Run Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000
