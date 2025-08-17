# 1. Começamos da imagem oficial do PHP 8.1
FROM php:8.1-cli-alpine

# 2. Instalamos as dependências do sistema e as extensões PHP
RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS linux-headers \
    # Adicionamos as bibliotecas que faltavam para o Swoole
    && apk add --no-cache libstdc++ zlib-dev brotli-dev \
    && pecl install swoole \
    && docker-php-ext-enable swoole \
    # Adicionamos a extensão pcntl aqui
    && docker-php-ext-install pdo_mysql pcntl \
    && apk del .build-deps

# 3. Instalamos o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Definimos o diretório de trabalho
WORKDIR /opt/www

# 5. Definimos o comando padrão para iniciar o servidor
ENTRYPOINT ["php", "/opt/www/bin/hyperf.php", "start"]