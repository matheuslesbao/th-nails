FROM phpdockerio/php:8.3-fpm
WORKDIR "/app"

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        php8.3-mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# UPDATE APT-GET AND INSTALL LIBS
RUN apt-get update -y
RUN apt-get install -y openssl zip unzip git libnss3 libpng-dev
# Baixe o arquivo binário do MyCLI e copie-o para /usr/local/bin
RUN curl -sSLo /usr/local/bin/mycli https://github.com/dbcli/mycli/releases/download/v1.24.1/mycli-1.24.1-linux-x86_64
RUN chmod +x /usr/local/bin/mycli
# INSTALL COMPOSER
RUN apt-get install -y openssl zip unzip git libnss3
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
