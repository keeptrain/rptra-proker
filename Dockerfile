# Menggunakan image PHP sebagai base image
FROM php:8.3-fpm-alpine

# Menginstal ekstensi PHP yang diperlukan
RUN docker-php-ext-install pdo pdo_mysql

# Mengatur working directory
WORKDIR /var/www/html

# Menyalin file composer.lock dan composer.json
COPY composer.* ./

# Menginstal dependensi Composer
RUN composer install --no-scripts --optimize-autoloader

# Menyalin kode aplikasi
COPY . .

# Mengatur izin
RUN chown -R www-data:www-data storage bootstrap/cache

# Menjalankan perintah Artisan
RUN php artisan optimize:clear

# Menjalankan aplikasi
CMD ["php-fpm"]