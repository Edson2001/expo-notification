FROM php:8.1-cli

RUN apt-get update && apt-get install -y \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath opcache

RUN docker-php-ext-enable pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


WORKDIR /var/www/html

COPY . /var/www/html
RUN composer install --optimize-autoloader --no-dev

EXPOSE 8030

CMD ["php", "-S", "0.0.0.0:8030", "-t", "public"]