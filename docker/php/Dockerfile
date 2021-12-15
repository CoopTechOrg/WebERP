# windows用のdockerfile

FROM php:7.4.1-fpm

# COPY php.ini
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

# Composer install
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

ARG GID
ARG UID
ARG GROUPNAME
ARG USERNAME

# install packages including Node.js
RUN apt-get update && \
    curl -fsSL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get -y install \
    nodejs\
    git \
    zip \
    unzip \
    vim \
    && docker-php-ext-install pdo_mysql bcmath


WORKDIR /

RUN mkdir /app

RUN chmod -R 777 /app

RUN groupadd -g $GID $GROUPNAME
RUN useradd -m -s /bin/bash -u $UID -g $GID -G sudo $USERNAME
RUN echo $USERNAME:passwd | chpasswd
USER $USERNAME

WORKDIR /app