FROM php:7.3-fpm-alpine3.10

COPY --from=composer:1.7 /usr/bin/composer /usr/bin

WORKDIR /app

RUN apk add --no-cache bash libxml2-dev libzip-dev nodejs nodejs-npm php7-bcmath
RUN docker-php-ext-install -j"$(nproc)" opcache zip pdo_mysql

RUN npm config set unsafe-perm true
RUN npm install -g yarn

RUN echo "error_log=/var/log/php_error.log" >> /usr/local/etc/php/php.ini
RUN echo "log_errors=on" >> /usr/local/etc/php/php.ini
RUN echo "memory_limit=1024M" >> /usr/local/etc/php/php.ini

ENV PATH="/app:/app/bin:/app/node_modules/.bin:/app/vendor/bin:${PATH}"
ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS="0"
ENV PHP_OPCACHE_MAX_ACCELERATED_FILES="10000"
ENV PHP_OPCACHE_MEMORY_CONSUMPTION="192"

COPY docker/fpm/start-fpm.sh /start-fpm.sh
RUN chmod a+x /start-fpm.sh

EXPOSE 9000

CMD ["/start-fpm.sh"]
