FROM php:8.2-fpm-alpine

# Cài các thư viện cần thiết
RUN apk add --no-cache \
    nginx \
    nodejs npm \
    git curl unzip \
    libpng-dev oniguruma-dev libxml2-dev \
    mysql-client \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Cài Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy toàn bộ code vào container
COPY . .

# Cài PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Cài Node dependencies và build assets
RUN npm install && npm run build

# Phân quyền storage
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Copy nginx config
COPY docker/nginx.conf /etc/nginx/nginx.conf

EXPOSE 80

CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]