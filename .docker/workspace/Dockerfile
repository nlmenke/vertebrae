ARG PHP_VERSION=7.2
FROM phusion/baseimage:0.11

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

ARG GID=1000
ARG GNAME=vertebrae
ARG UID=1000
ARG UNAME=vertebrae
RUN set -xe; \
    apt-get update -yqq && \
    apt-get upgrade -yqq && \
    pecl channel-update pecl.php.net && \
    groupadd -g ${GID} ${GNAME} && \
    useradd -u ${UID} -g ${GNAME} -m ${UNAME} -G docker_env && \
    usermod -p "*" ${UNAME} -s /bin/bash && \
    apt-get install -yqq \
        nasm && \
    php -m | grep -q 'zip'

ARG TZ=UTC
RUN ln -snf /usr/share/zoneinfo/${TZ} /etc/localetime && \
    echo ${TZ} > /etc/timezone

COPY ./aliases.sh /root/aliases.sh
COPY ./aliases.sh /home/${UNAME}/aliases.sh

RUN sed -i 's/\r//' /root/aliases.sh && \
    sed -i 's/\r//' /home/${UNAME}/aliases.sh && \
    chown ${UNAME}:${GNAME} /home/${UNAME}/aliases.sh && \
    echo "" >> ~/.bashrc && \
    echo "# Load Custom Aliases" >> ~/.bashrc && \
    echo "source ~/aliases.sh" >> ~/.bashrc && \
    echo "" >> ~/.bashrc

###############################################################################

USER ${UNAME}

RUN echo "" >> ~/.bashrc && \
    echo "# Load Custom Aliases" >> ~/.bashrc && \
    echo "source ~/aliases.sh" >> ~/.bashrc && \
    echo "" >> ~/.bashrc

###############################################################################

USER root

COPY ./composer.json /home/${UNAME}/.composer/composer.json

RUN chown -R ${UNAME}:${GNAME} /home/${UNAME}/.composer

RUN echo "" >> ~/.bashrc && \
    echo 'export PATH="$HOME/.composer/vendor/bin:$PATH"' >> ~/.bashrc

###############################################################################

USER ${UNAME}

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

USER ${UNAME}

ARG NODE_VERSION=node
ENV NVM_DIR /home/${UNAME}/.nvm

RUN mkdir -p $NVM_DIR && \
    curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.0/install.sh | bash && \
    . ${NVM_DIR}/nvm.sh && \
    nvm install ${NODE_VERSION} && \
    nvm use ${NODE_VERSION} && \
    nvm alias ${NODE_VERSION} && \
    ln -s `npm bin --global` /home/${UNAME}/.node-bin

RUN echo "" >> ~/.bashrc && \
    echo 'export NVM_DIR="$HOME/.nvm"' >> ~/.bashrc && \
    echo '[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh" # this loads nvm' >> ~/.bashrc

###############################################################################

USER root

RUN echo "" >> ~/.bashrc && \
    echo 'export NVM_DIR="/home/${UNAME}/.nvm"' >> ~/.bashrc && \
    echo '[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh" # this loads nvm' >> ~/.bashrc

ENV PATH $PATH:/home/${UNAME}/.node-bin

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

USER root

ARG INSTALL_FFMPEG=false
RUN if [ ${INSTALL_FFMPEG} = true ]; then \
    apt-get -y install ffmpeg; \
fi

###############################################################################

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

RUN set -xe; \
    php -v | head -n 1 | grep -q "PHP ${PHP_VERSION}."

RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    rm /var/log/lastlog /var/log/faillog

WORKDIR /var/www
