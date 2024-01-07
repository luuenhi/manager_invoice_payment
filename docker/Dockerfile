FROM php:8.2-fpm-buster

# env(setup composer)
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# install
RUN apt-get update \
    && apt-get install -y zlib1g-dev mariadb-client vim libzip-dev libpng-dev unzip procps \
    && docker-php-ext-install zip pdo_mysql gd

# Install XDebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Laravel
COPY ./ /var/www/html

# copy
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

# set timezone
RUN cp /usr/share/zoneinfo/Asia/Ho_Chi_Minh /etc/localtime

# Install Laravel
RUN composer install
RUN chmod -R 777 /composer
RUN chown www-data:www-data -R /var/www/html/storage
