FROM php:8.3-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends libicu-dev libzip-dev unzip git \
    && docker-php-ext-install intl zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
        /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf \
    && a2enmod rewrite

WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction \
    && chown -R www-data:www-data writable \
    && chmod -R 775 writable

ENV CI_ENVIRONMENT=production

# fix MPM ganda (bug railway + php-apache), set port, start apache
CMD ["bash", "-c", "rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.* && a2enmod mpm_prefork 2>/dev/null; sed -i \"s/Listen 80$/Listen ${PORT:-80}/\" /etc/apache2/ports.conf && sed -i \"s/:80>/:${PORT:-80}>/\" /etc/apache2/sites-available/000-default.conf && apache2-foreground"]