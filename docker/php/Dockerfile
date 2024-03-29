FROM php:8.1-apache

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ENV TZ=Europe/Paris
ENV APP_ENV=dev
ENV APP_DEBUG=1

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN apt update -y \
    && apt install -y --no-install-recommends \
    	locales apt-utils git libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev wget \
    && ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone \
    && locale-gen

RUN docker-php-ext-configure intl \
    && docker-php-ext-install pdo pdo_mysql gd opcache intl zip calendar dom mbstring zip gd xsl \
    && pecl install apcu && docker-php-ext-enable apcu

RUN wget https://github.com/FriendsOfPHP/PHP-CS-Fixer/releases/download/v3.5.0/php-cs-fixer.phar -O php-cs-fixer \
	&& chmod a+x php-cs-fixer \
	&& mv php-cs-fixer /usr/local/bin/php-cs-fixer

WORKDIR /var/www/
