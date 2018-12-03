FROM alpine

# 安装apache2
RUN set -xe \
    && apk add --no-cache \
    apache2 \
    apache2-ssl \
    apache2-utils \
    apache2-error

# 修改apache2配置
RUN set -xe \
    && echo "ServerName cleverbao.blog" >> /etc/apache2/httpd.conf \
    && mkdir -p /run/apache2

# 安装php和php扩展
RUN set -xe \
    && apk add --no-cache \
    php7 \
    php7-dev \
    php7-pear \
    php7-apache2 \
    php7-session \
    php7-zlib \
    php7-gd \
    php7-xml \
    php7-phar \
    php7-intl \
    php7-opcache \
    php7-json

# 设置phpize开发环境
ENV PHPIZE_DEPS \
    autoconf \
    dpkg-dev dpkg \
    file \
    g++ \
    gcc \
    libc-dev \
    make \
    pkgconf \
    re2c

# 安装phpize开发环境，安装mongodb扩展
RUN set -xe \
    && apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS \
    && pecl install -o -f mongodb \
    && echo "extension=mongodb.so" >> /etc/php7/php.ini \
    && apk del .phpize-deps \
    && rm -rf /usr/share/php \
    && rm -rf /tmp/*

# 设置mongodb
RUN set -xe \
    && apk add --no-cache mongodb \
    && mkdir -p /data/db 

# copy网站源码、数据库数据和启动脚本
COPY ./htdocs /var/www/localhost/htdocs
COPY ./db.js /db.js
COPY ./start.sh /start.sh

# 设置启动脚本
CMD [ "/bin/sh", "/start.sh" ]