# Gunakan base image PHP + Composer + Node.js
FROM php:8.2-fpm

# Install dependencies yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    nodejs \
    npm

# Set working directory
WORKDIR /var/www/html

# Copy semua file ke container
COPY . .

# Install composer dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Install npm dependencies dan build aset Vite
RUN npm install && npm run build

# Generate application key
RUN php artisan key:generate

# Expose port untuk Laravel
EXPOSE 8000

# Jalankan Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
