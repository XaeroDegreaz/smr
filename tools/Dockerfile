FROM php:7.4-cli-alpine

RUN docker-php-ext-install mysqli

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install SMR-related dependencies
WORKDIR /smr
COPY tools/composer.json .
RUN composer install --no-interaction

# Get the SMR source code
COPY ./engine ./engine
COPY ./htdocs ./htdocs
COPY ./lib ./lib
COPY ./tools ./tools

WORKDIR /smr/tools
