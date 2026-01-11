FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    ffmpeg \
    libpq-dev \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Apache config
RUN a2enmod rewrite

# 👉 CAMBIO CLAVE
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf

WORKDIR /var/www/html

# Permisos correctos
RUN chown -R www-data:www-data /var/www/html