ARG PHP_VERSION=7.2
FROM phusion/baseimage:latest

LABEL maintainer="Nick Menke <nick@nlmenke.net>"

ARG PHP_VERSION

ARG LOCALE=en_US.UTF-8
ENV DEBIAN_FRONTEND=noninteractive
ENV locale-gen ${LOCALE}
ENV LANGUAGE=${LOCALE}
ENV LC_ALL=${LOCALE}
ENV LC_CTYPE=${LOCALE}
ENV LANG=${LOCALE}
ENV TERM xterm

RUN apt-get update -yqq && \
    apt-get upgrade -yqq -o Dpkg::Options::="--force-confold" && \
    apt-get install -y software-properties-common && \
    add-apt-repository -y ppa:ondrej/php

RUN apt-get update -yqq && \
    apt-get upgrade -yqq && \
    apt-get install -yqq \
        --allow-downgrades \
        --allow-remove-essential \
        --allow-change-held-packages \
        php${PHP_VERSION}-cli \
        php${PHP_VERSION}-common \
        php${PHP_VERSION}-curl \
        php${PHP_VERSION}-intl \
        php${PHP_VERSION}-json \
        php${PHP_VERSION}-xml \
        php${PHP_VERSION}-mbstring \
        php${PHP_VERSION}-mysql \
        php${PHP_VERSION}-pgsql \
#        php${PHP_VERSION}-sqlite \
        php${PHP_VERSION}-sqlite3 \
        php${PHP_VERSION}-zip \
        php${PHP_VERSION}-bcmath \
        php${PHP_VERSION}-memcached \
        php${PHP_VERSION}-gd \
        php${PHP_VERSION}-dev \
        apt-utils \
        pkg-config \
        libcurl4-openssl-dev \
        libedit-dev \
        libssl-dev \
        libxml2-dev \
        libzip-dev \
        xz-utils \
        libsqlite3-dev \
        sqlite3 \
        git \
        curl \
        vim \
        nano \
        zip \
        unzip && \
    apt-get clean

RUN curl -s http://getcomposer.org/installer | php && \
    echo "export PATH=${PATH}:/var/www/vendor/bin" >> ~/.bashrc && \
    mv composer.phar /usr/local/bin/composer

RUN . ~/.bashrc

###############################################################################

USER root

ARG PGID=1000
ARG PUID=1000
RUN set -xe; \
    apt-get update -yqq && \
    apt-get upgrade -yqq && \
    pecl channel-update pecl.php.net && \
    groupadd -g ${PGID} vertebrae && \
    useradd -u ${PUID} -g vertebrae -m vertebrae -G docker_env && \
    usermod -p "*" vertebrae -s /bin/bash && \
    apt-get install -yqq \
        nasm && \
    php -m | grep -q 'zip'

ARG TZ=UTC
RUN ln -snf /usr/share/zoneinfo/${TZ} /etc/localetime && \
    echo ${TZ} > /etc/timezone

COPY ./aliases.sh /root/aliases.sh
COPY ./aliases.sh /home/vertebrae/aliases.sh

RUN sed -i 's/\r//' /root/aliases.sh && \
    sed -i 's/\r//' /home/vertebrae/aliases.sh && \
    chown vertebrae:vertebrae /home/vertebrae/aliases.sh && \
    echo "" >> ~/.bashrc && \
    echo "# Load Custom Aliases" >> ~/.bashrc && \
    echo "source ~/aliases.sh" >> ~/.bashrc && \
    echo "" >> ~/.bashrc

###############################################################################

USER vertebrae

RUN echo "" >> ~/.bashrc && \
    echo "# Load Custom Aliases" >> ~/.bashrc && \
    echo "source ~/aliases.sh" >> ~/.bashrc && \
    echo "" >> ~/.bashrc

###############################################################################

USER root

COPY ./composer.json /home/vertebrae/.composer/composer.json

RUN chown -R vertebrae:vertebrae /home/vertebrae/.composer

RUN echo "" >> ~/.bashrc && \
    echo 'export PATH="$HOME/.composer/vendor/bin:$PATH"' >> ~/.bashrc

###############################################################################

USER vertebrae

RUN composer global install

RUN echo "" >> ~/.bashrc && \
    echo 'export PATH="~./composer/vendor/bin:$PATH"' >> ~/.bashrc

RUN echo "" >> ~/.bashrc && \
    echo 'export PATH="/var/www/vendor/bin:$PATH"' >> ~/.bashrc

###############################################################################

USER root

COPY ./crontab /etc/cron.d

RUN chmod -R 644 /etc/cron.d

ARG INSTALL_XDEBUG=false
RUN if [ ${INSTALL_XDEBUG} = true ]; then \
    apt-get install -yqq php${PHP_VERSION}-xdebug && \
    sed -i 's/^;//g' /etc/php/${PHP_VERSION}/cli/conf.d/20-xdebug.ini; \
fi

COPY ./xdebug.ini /etc/php/${PHP_VERSION}/cli/conf.d/xdebug.ini

RUN apt-get update -yqq && \
    apt-get install -yqq php-redis

###############################################################################

USER vertebrae

ARG NODE_VERSION=node
ENV NVM_DIR /home/vertebrae/.nvm

RUN mkdir -p $NVM_DIR && \
    curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.0/install.sh | bash && \
    . ${NVM_DIR}/nvm.sh && \
    nvm install ${NODE_VERSION} && \
    nvm use ${NODE_VERSION} && \
    nvm alias ${NODE_VERSION} && \
    ln -s `npm bin --global` /home/vertebrae/.node-bin

RUN echo "" >> ~/.bashrc && \
    echo 'export NVM_DIR="$HOME/.nvm"' >> ~/.bashrc && \
    echo '[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh" # this loads nvm' >> ~/.bashrc

###############################################################################

USER root

RUN echo "" >> ~/.bashrc && \
    echo 'export NVM_DIR="/home/vertebrae/.nvm"' >> ~/.bashrc && \
    echo '[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh" # this loads nvm' >> ~/.bashrc

ENV PATH $PATH:/home/vertebrae/.node-bin

RUN find $NVM_DIR -type f -name node -exec ln -s {} /usr/local/bin/node \; && \
    NODE_MODS_DIR="$NVM_DIR/versions/node/$(node -v)/lib/node_modules" && \
    ln -s $NODE_MODS_DIR/bower/bin/bower /usr/local/bin/bower && \
    ln -s $NODE_MODS_DIR/gulp/bin/gulp.js /usr/local/bin/gulp && \
    ln -s $NODE_MODS_DIR/npm/bin/npm-cli.js /usr/local/bin/npm && \
    ln -s $NODE_MODS_DIR/npm/bin/npx-cli.js /usr/local/bin/npx && \
    ln -s $NODE_MODS_DIR/vue-cli/bin/vue /usr/local/bin/vue && \
    ln -s $NODE_MODS_DIR/vue-cli/bin/vue-init /usr/local/bin/vue-init && \
    ln -s $NODE_MODS_DIR/vue-cli/bin/vue-list /usr/local/bin/vue-list

###############################################################################

USER vertebrae

ARG INSTALL_YARN=true
ARG YARN_VERSION=latest
RUN if [ ${INSTALL_YARN} = true ]; then \
    [ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh" && \
    if [ ${YARN_VERSION} = "latest" ]; then \
        curl -o- -L https://yarnpkg.com/install.sh | bash; \
    else \
        curl -o- -L https://yarnpkg.com/install.sh | bash -s -- --version ${YARN_VERSION}; \
    fi && \
    echo "" >> ~/.bashrc && \
    echo 'export PATH="$HOME/.yarn/bin:$PATH"' >> ~/.bashrc; \
fi

###############################################################################

USER root

RUN if [ ${INSTALL_YARN} = true ]; then \
    echo "" >> ~/.bashrc && \
    echo 'export YARN_DIR="/home/vertebrae/.yarn"' >> ~/.bashrc && \
    echo 'export PATH="$YARN_DIR/bin:$PATH"' >> ~/.bashrc; \
fi

ENV PATH $PATH:/home/vertebrae/.yarn/bin

RUN apt-get install -yqq \
        jpegoptim \
        optipng \
        pngquant \
        gifsicle \
        imagemagick \
        php-imagick && \
    exec bash && \
    . ~/.bashrc && \
    npm install -g svgo

RUN set -xs; \
    php -v | head -n 1 | grep -q "PHP ${PHP_VERSION}."

RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    rm /var/log/lastlog /var/log/faillog

WORKDIR /var/www
