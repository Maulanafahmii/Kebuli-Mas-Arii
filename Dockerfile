# ========== STAGE 1: Build Frontend (Vite) ==========
FROM node:18-alpine AS build
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build


# ========== STAGE 2: Laravel + PHP CLI ==========
FROM php:8.2-cli

# Install dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy project files
COPY . .

# Copy hasil build dari stage sebelumnya
COPY --from=build /app/public/build ./public/build

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Siapkan environment Laravel
RUN cp .env.example .env || true
RUN php artisan key:generate

# Expose port
EXPOSE 8000

# Jalankan Laravel menggunakan built-in PHP server (Railway pakai variabel PORT)
CMD php -S 0.0.0.0:${PORT:-8000} -t public
