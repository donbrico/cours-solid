FROM phpdockerio/php:8.2-fpm
WORKDIR "/application"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        git gcc curl\
        php8.2-memcached \ 
        php8.2-mysql \ 
        php8.2-redis \ 
        php8.2-xdebug \ 
        php8.2-yaml; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN curl https://cli-assets.heroku.com/install-ubuntu.sh | sh
