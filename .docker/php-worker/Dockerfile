ARG PHP_VERSION=latest
FROM php:${PHP_VERSION}-alpine

LABEL maintainer="Nick Menke <nick@nlmenke.net>"

ARG PHP_VERSION

RUN apk --update add wget \
    curl \
    git \
    build-base \
    libmemcached-dev \
    libmcrypt-dev \
    libxml2-dev \
    pcre-dev \
    zlib-dev \
    autoconf \
    cyrus-sasl-dev \
    libgsasl-dev \
    supervisor

RUN docker-php-ext-install mysqli pdo pdo_mysql tokenizer xml pcntl

RUN if [ $(php -r "echo PHP_MINOR_VERSION;") = "2" ]; then \
    # PHP_VERSION is 7.2
    docker-php-ext-install mbstring; \
fi

RUN pecl channel-update pecl.php.net && \
    pecl install memcached mcrypt-1.0.1 && \
    printf "\n" | pecl install -o -f redis && \
    rm -rf /tmp/pear

RUN docker-php-ext-enable memcached && \
    docker-php-ext-install bcmath && \
    docker-php-ext-enable redis

RUN set -eux; \
    apk --update add libzip-dev && \
    if [ $(php -r "echo PHP_MINOR_VERSION;") = "3" || $(php -r "echo PHP_MINOR_VERSION;") = "4" ]; then \
      # PHP_VERSION is 7.3 or 7.4
      docker-php-ext-configure zip; \
    else \
      docker-php-ext-configure zip --with-libzip; \
    fi && \
    docker-php-ext-install zip

ARG UID=1000
ARG UNAME=vertebrae
ARG GID=1000
ARG GNAME=vertebrae
RUN addgroup -g ${GID} ${GNAME} && \
    adduser -D -G ${GNAME} -u ${UID} ${UNAME}

COPY supervisord.conf /etc/supervisord.conf

ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisord.conf"]

RUN set -xe; \
    php -v | head -n 1 | grep -q "PHP ${PHP_VERSION}."

RUN rm /var/cache/apk/* && \
    mkdir -p /var/www

WORKDIR /etc/supervisor/conf.d/
