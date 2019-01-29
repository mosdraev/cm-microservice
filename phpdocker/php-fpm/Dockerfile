FROM phpdockerio/php72-fpm:latest
WORKDIR "/var/www/yfp-6-0"

# Install selected extensions and other stuff
RUN apt-get update --fix-missing \
    && apt-get -y --no-install-recommends install  php7.2-mysql php-redis php7.2-gd php-imagick php7.2-imap php7.2-intl php7.2-soap php-xdebug \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install Git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
