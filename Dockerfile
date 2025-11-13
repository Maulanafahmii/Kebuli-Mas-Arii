# ============ STAGE 1: Build Frontend (Vite) ============
FROM node:18-alpine AS build
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# ============ STAGE 2: Laravel + PHP Environment ============
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
COPY --from=build /app/public/build ./public/build

RUN composer install --no-dev --optimize-autoloader
RUN cp .env.example .env
RUN touch database/database.sqlite
RUN php artisan key:generate

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
