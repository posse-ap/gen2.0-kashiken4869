FROM php:7.4-fpm
COPY php.ini /usr/local/etc/php/
RUN apt-get update
RUN docker-php-ext-install pdo_mysql