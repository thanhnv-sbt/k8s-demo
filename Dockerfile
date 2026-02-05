# STAGE 1: Build (Tạm gọi là máy ảo dùng để nấu ăn)
FROM composer:latest AS builder
WORKDIR /app
COPY . .
# Cài đặt thư viện thực tế, loại bỏ các thư viện phục vụ testing
RUN composer install --no-dev --optimize-autoloader

# STAGE 2: Production (Máy ảo dùng để dọn món cho khách)
FROM php:8.2-fpm-alpine

# Cài đặt các extension tối thiểu (dùng Alpine Linux cho siêu nhẹ)
RUN docker-php-ext-install pdo_mysql bcmath

WORKDIR /var/www

# CHỈ COPY những gì cần thiết từ Stage 1 sang Stage 2
COPY --from=builder /app /var/www
# Cấp quyền cho user của PHP-FPM
RUN chown -R www-data:www-data /var/www/storage

EXPOSE 9000
CMD ["php-fpm"]
