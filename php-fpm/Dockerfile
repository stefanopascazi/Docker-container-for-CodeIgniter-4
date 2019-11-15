# php-fpm
FROM php:fpm-alpine

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli

COPY ./config/php.ini /usr/local/etc/php/

CMD ["php-fpm"]

EXPOSE 9000