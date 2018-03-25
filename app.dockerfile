FROM php:7.2.3-fpm

RUN apt-get update && apt-get install -y mcrypt libmcrypt-dev
