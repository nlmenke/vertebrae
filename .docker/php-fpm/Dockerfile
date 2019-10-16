ARG PHP_VERSION=latest
FROM php:${PHP_VERSION}-fpm

LABEL maintainer="Nick Menke <nick@nlmenke.net>"

RUN set -xe; \
    apt-get update -yqq && \
    apt-get upgrade -yqq && \
    pecl channel-update pecl.php.net && \
    apt-get install -yqq \
        --no-install-recommends \
        apt-utils \
        curl \
        g++ \
        gifsicle \
        imagemagick \
        jpegoptim \
        libmemcached-dev \
        libicu-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        libmagickwand-dev \
        libmcrypt-dev \
        libzip-dev \
        optipng \
        pngquant \
        unzip \
        zip \
        zlib1g-dev && \
    rm -rf /var/lib/apt/lists/*

RUN pecl install imagick && \
    printf "\n" | pecl install -o -f redis && \
    rm -rf /tmp/pear

RUN docker-php-ext-install pdo_mysql && \
    docker-php-ext-install pdo_pgsql && \
    docker-php-ext-configure gd \
        --with-jpeg-dir=/usr/lib \
        --with-freetype-dir=/usr/include/freetype2 && \
    docker-php-ext-install gd && \
    docker-php-ext-configure zip \
        --with-libzip && \
    docker-php-ext-install zip && \
    php -m | grep -q 'zip' && \
    docker-php-ext-install bcmath && \
    docker-php-ext-enable imagick && \
    docker-php-ext-configure intl && \
    docker-php-ext-install intl && \
    docker-php-ext-install mysqli && \
    docker-php-ext-install opcache && \
    docker-php-ext-enable redis

COPY ./opcache.ini /rsr/local/etc/php/conf.d/opcache.ini
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

ARG INSTALL_XDEBUG=false
RUN if [ ${INSTALL_XDEBUG} = true ]; then \
    if [ $(php -r "echo PHP_MAJOR_VERSION;") = "5" ]; then \
        pecl install xdebug-2.5.5; \
    else \
        pecl install xdebug; \
    fi && \
    docker-php-ext-enable xdebug; \
fi

RUN set -xs; php -v | head -n 1 | grep -q "PHP ${PHP_VERSION}."

COPY ./laravel.ini /usr/local/etc/php/conf.d
COPY ./xlaravel.pool.conf /usr/local/etc/php-fpm.d/

USER root

RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    rm /var/log/lastlog /var/log/faillog

RUN usermod -u 1000 www-data

WORKDIR /var/www

CMD ["php-fpm"]

EXPOSE 9000
