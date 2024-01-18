FROM alpine:3.16.3

# Set language.
ENV LANG=en_US.UTF-8 LANGUAGE=en_US:en LC_ALL=en_US.UTF-8

# Upgrade and update repositories.
RUN apk upgrade && apk update --repository=https://dl-4.alpinelinux.org/alpine/v3.16/community;

# Install required libs.
RUN apk add --no-cache composer curl supervisor zip unzip git openssh-client

RUN composer self-update --2

# Install PHP and extensions.
RUN apk --no-cache add php81 php81-pear php81-dev php81-cli php81-common php81-json php81-opcache php81-pdo_mysql php81-mbstring php81-session \
    php8-pecl-mcrypt php81-fpm php81-xml php81-curl php81-zip php81-pcntl php81-posix php81-dom php81-tokenizer php81-simplexml php81-xmlwriter php81-fileinfo \
    php81-gd php81-bcmath php81-redis php81-imap && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Install Nginx and configure.
RUN apk add --no-cache nginx && adduser -D www-data -G www-data && mkdir -p /usr/share/nginx/html /run/php /var/tmp/nginx /var/lib/nginx && chown -R www-data:www-data /usr/share/nginx/html /run/php /var/tmp/nginx /var/lib/nginx

# Update php.ini
RUN sed -i -e 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g' /etc/php8/php.ini

# Add config files.
COPY ./config/php.ini /etc/php8/php.ini
COPY ./config/www.conf /etc/php8/php-fpm.d/www.conf
COPY --chown=www-data:www-data ./config/nginx.conf /etc/nginx/nginx.conf

COPY --chown=www-data:www-data scripts /home/www-data/scripts
RUN chmod +x -R /home/www-data/scripts

USER root

RUN apk add --no-cache --repository http://dl-3.alpinelinux.org/alpine/v3.16/testing gnu-libiconv
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

USER www-data

WORKDIR /usr/share/nginx/html

ARG APP_ENV

COPY --chown=www-data:www-data ./deployment/supervisord.${APP_ENV}.conf /etc/supervisord.conf
COPY --chown=www-data:www-data ./deployment/.env.${APP_ENV} ./.env
COPY --chown=www-data:www-data ./deployment/cronjob.${APP_ENV}  /cronjob

COPY --chown=www-data:www-data ../ ./
RUN rm -Rf docker

USER root
RUN mv -f /home/www-data/scripts/start.${APP_ENV}.sh /start.sh

EXPOSE 80

ENTRYPOINT ["/start.sh"]
