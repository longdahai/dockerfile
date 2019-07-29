FROM php:7-cli-alpine

MAINTAINER haiwei.free@gmail.com

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN set -ex; \
	apk add --no-cache --virtual .build-deps $PHPIZE_DEPS; \
	apk add --no-cache libstdc++; \
	\
	docker-php-ext-install -j "$(nproc)" opcache; \
	\
	pecl install redis && docker-php-ext-enable redis; \
	pecl install swoole && docker-php-ext-enable swoole; \
	\
	apk del .build-deps;

# set recommended PHP.ini settings
# see https://secure.php.net/manual/en/opcache.installation.php
RUN { \
	echo 'opcache.memory_consumption=128'; \
	echo 'opcache.interned_strings_buffer=8'; \
	echo 'opcache.max_accelerated_files=4000'; \
	echo 'opcache.revalidate_freq=2'; \
	echo 'opcache.fast_shutdown=1'; \
	} > /usr/local/etc/php/conf.d/opcache-recommended.ini
# https://codex.wordpress.org/Editing_wp-config.php#Configure_Error_Logging
RUN { \
	echo 'error_reporting = 4339'; \
	echo 'display_errors = Off'; \
	echo 'display_startup_errors = Off'; \
	echo 'log_errors = On'; \
	echo 'error_log = /dev/stderr'; \
	echo 'log_errors_max_len = 1024'; \
	echo 'ignore_repeated_errors = On'; \
	echo 'ignore_repeated_source = Off'; \
	echo 'html_errors = Off'; \
	} > /usr/local/etc/php/conf.d/error-logging.ini

ENV MSEC 1000
ENV URL http://www.baidu.com

COPY src /var/www/html/
CMD ["php", "/var/www/html/main.php"]