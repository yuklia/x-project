FROM php:7-fpm

MAINTAINER yuklia

# upgrade the container
RUN apt-get update && \
    apt-get upgrade -y

RUN curl -sL https://deb.nodesource.com/setup_6.x | bash -

RUN apt-get install -y --force-yes curl git nano zlib1g-dev nodejs \
    && docker-php-ext-install zip pdo pdo_mysql \
    && docker-php-ext-enable zip

# install composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    printf "\nPATH=\"~/.composer/vendor/bin:\$PATH\"\n" | tee -a ~/.bashrc

RUN pecl install xdebug-2.5.0 \
    && docker-php-ext-enable xdebug

ARG XDEBUG_INI=/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN echo "xdebug.default_enable = off" >> ${XDEBUG_INI} \
    && echo "xdebug.remote_enable = on" >> ${XDEBUG_INI} \
    && echo "xdebug.remote_autostart = off" >> ${XDEBUG_INI} \
    && echo "xdebug.remote_connect_back = off" >> ${XDEBUG_INI} \
    && echo "xdebug.remote_port = 9001" >> ${XDEBUG_INI} \
    && echo "xdebug.remote_host = 10.254.254.254" >> ${XDEBUG_INI}

# install laravel envoy
RUN composer global require "laravel/envoy"

#install laravel installer
RUN composer global require "laravel/installer"

WORKDIR /var/www
