FROM php:8.1-fpm

#Install packages and php extensions
RUN apt-get update \
  && apt-get install -y --quiet --no-install-recommends \
    git \
    zlib1g-dev \
    libicu-dev \
    g++ \
    libbz2-dev \
    libzip-dev \
    libsodium-dev \
    libjpeg-dev \
    libpng-dev \
    libxml2-dev \
    libmagickwand-dev \
    libmagickcore-dev \
    ghostscript \
    libpq-dev \
  && yes '' | pecl install -f imagick \
  && rm -r /tmp/pear \
  && docker-php-ext-configure intl \
  && docker-php-ext-configure gd --with-jpeg \
  && docker-php-ext-install \
    pdo \
    pdo_mysql \
    intl \
    bz2 \
    zip \
    sodium \
    soap \
    gd \
    exif \
    pdo_pgsql \
    pgsql \
  && docker-php-ext-enable \
    imagick \
    gd \
    exif

# Envs
ENV APP_HOME ${APP_HOME}
ENV USR_HOME /home/www-data

# Configure new home dir
RUN usermod -d ${USR_HOME} www-data

# This image ships with the default php.ini-development and php.ini-production configuration files.
# Use the default development configuration
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Change workdir
WORKDIR ${APP_HOME}

# I be leave it is the signal for root
STOPSIGNAL SIGQUIT

# Change user
USER www-data

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
