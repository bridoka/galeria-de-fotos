FROM php:7.2.3-fpm

RUN apt-get update && apt-get install -y mcrypt libmcrypt-dev

COPY "memory-limit-php.ini" "/usr/local/etc/php/conf.d/memory-limit-php.ini"
