# Gunakan image yang sudah ada PHP + Composer + Node.js
FROM richarvey/nginx-php-fpm:latest

# Set working directory
WORKDIR /var/www/html

# Copy semua file project
COPY . .

# Install dependencies Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Install dependencies npm untuk Vite dan build aset
RUN npm install && npm run build

# Generate app key Laravel
RUN php artisan key:generate

# Expose port default Laravel
EXPOSE 8000

# Jalankan Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
