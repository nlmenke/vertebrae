ARG NGINX_VERSION=alpine
FROM nginx:${NGINX_VERSION}

LABEL maintainer="Nick Menke <nick@nlmenke.net>"

COPY nginx.conf /etc/nginx/

RUN apk update && \
    apk upgrade && \
    apk --update add logrotate && \
    apk add --no-cache openssl && \
    apk add --no-cache bash

RUN set -x; \
    addgroup -g 82 -S www-data; \
    adduser -u 82 -D -S -G www-data www-data && \
    exit 0; \
    exit 1

RUN touch /var/log/messages

COPY logrotate/nginx /etc/logrotate.d/

ARG PHP_UPSTREAM_PORT=9000
RUN echo "upstream php-upstream { server php-fpm:${PHP_UPSTREAM_PORT}; }" > /etc/nginx/conf.d/upstream.conf && \
    rm /etc/nginx/conf.d/default.conf

ADD ./startup.sh /opt/startup.sh

RUN sed -i 's/\r//g' /opt/startup.sh

CMD ["/bin/bash", "/opt/startup.sh"]

EXPOSE 80 443
