# 1. Começamos da imagem oficial do PHP 8.1
FROM php:8.1-cli-alpine

# 2. Instalamos as dependências do sistema e as extensões PHP
RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS linux-headers autoconf make gcc g++ \
    # Adicionamos as bibliotecas que faltavam para o Swoole e phpredis build
    && apk add --no-cache libstdc++ zlib-dev brotli-dev openssl-dev \
    && pecl install swoole redis \
    && docker-php-ext-enable swoole redis \
    # Adicionamos a extensão pcntl e pdo_mysql
    && docker-php-ext-install pdo_mysql pcntl \
    && apk del .build-deps

# 3. Instalamos o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Definimos o diretório de trabalho
WORKDIR /opt/www
## Copy composer files and install dependencies during build
COPY composer.json composer.lock ./
# Install dependencies strictly from lock file for reproducible builds
RUN composer install --no-dev --no-interaction --optimize-autoloader --no-progress

# Copy application source
COPY . /opt/www

# 5. Definimos o comando padrão para iniciar o servidor
ENTRYPOINT ["php", "/opt/www/bin/hyperf.php", "start"]