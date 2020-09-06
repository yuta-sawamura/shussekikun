FROM php:7.3.20-fpm-alpine

ENV COMPOSER_ALLOW_SUPERUSER 1
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN set -eux \
    && composer global require hirak/prestissimo

RUN set -eux \
    && apk add --update --no-cache libzip-dev \
    && docker-php-ext-install zip pdo_mysql bcmath zip

WORKDIR /var/www/html
COPY . /var/www/html

RUN set -eux \
    && composer install \
    && chmod -R a=rwX /var/www/html/storage