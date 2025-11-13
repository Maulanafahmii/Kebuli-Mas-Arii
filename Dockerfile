# ============ STAGE 1: Build Frontend (Vite) ============
FROM node:18-alpine AS build

# Set working directory
WORKDIR /app

# Copy package.json dan package-lock.json
COPY package*.json ./

# Install dependencies frontend
RUN npm install

# Copy semua file project
COPY . .

# Jalankan build Vite
RUN npm run build


# ============ STAGE 2: Laravel + PHP Environment ============
FROM php:8.2-fpm

# Install dependencies sistem + ekstensi PHP
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy semua file project dari stage build
COPY . .

# Copy hasil build frontend dari stage sebelumnya
COPY --from=build /app/public/build ./public/build

# Install dependency backend (Laravel)
RUN composer install --no-dev --optimize-autoloader

# Generate app key
RUN php artisan key:generate

# Expose port 8000
EXPOSE 8000

# Jalankan Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8000
