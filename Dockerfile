FROM php:fpm

RUN ["apt-get", "update"]
RUN ["apt-get", "install", "-y", "libzip-dev"]
RUN ["apt-get", "install", "-y", "zip"]
RUN ["apt-get", "install", "-y", "unzip"]
RUN ["apt-get", "install", "-y", "libxml2-dev"]
RUN ["docker-php-ext-install", "soap"]
RUN ["docker-php-ext-configure", "zip"]
RUN ["docker-php-ext-install", "mysqli", "pdo", "pdo_mysql", "zip"]

RUN touch /usr/local/etc/php/conf.d/uploads.ini \
    && echo "upload_max_filesize=64M;\r\n post_max_size=128M;\r\nmemory_limit = 512M" >> /usr/local/etc/php/conf.d/uploads.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./writable /var/www/html/writable

## Install codeIgniter Dependecies
COPY ./composer.json /var/www/html/composer.json
RUN cd /var/www/html/ && composer update /var/www/html/ --no-dev --ignore-platform-reqs "vendor/*"

RUN cd /var/www/html/
#RUN ["chmod", "-R", "777", "writable/"]
RUN ["chown", "-R", "www-data:www-data", "/var/www/html/"]
########################################

EXPOSE 9000