FROM php:7.4.30-fpm-bullseye
RUN apt-get update && apt-get install -y git zip unzip libcurl4-openssl-dev pkg-config libssl-dev
RUN pecl install redis && docker-php-ext-enable redis && pecl install mongodb-1.14.0 && docker-php-ext-enable mongodb && docker-php-ext-install pdo pdo_mysql
RUN curl -o /usr/bin/composer https://mirrors.aliyun.com/composer/composer.phar \
    && chmod +x /usr/bin/composer
WORKDIR /var/www
