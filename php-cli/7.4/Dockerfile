FROM php:7.4-cli-alpine

RUN set -ex; \
	\
	apk add --no-cache --virtual .build-deps $PHPIZE_DEPS; \
	apk add --no-cache libmcrypt-dev libjpeg-turbo-dev libpng-dev freetype-dev libwebp-dev libstdc++; \
	\
	pecl install redis && docker-php-ext-enable redis; \
	\
	docker-php-ext-configure gd --with-jpeg --with-freetype --with-webp; \
	docker-php-ext-install gd; \
	\
	docker-php-ext-install pdo_mysql bcmath sockets; \
	\
	pecl install swoole && docker-php-ext-enable swoole; \
	\
	docker-php-ext-install pcntl; \
	\
	apk del .build-deps;
