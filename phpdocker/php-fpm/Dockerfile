FROM phpdockerio/php80-fpm

WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get -y --no-install-recommends install  \
php-memcached php-mysql php-redis \
php-xdebug php-bcmath php-bz2 php-gd \
php-soap php-intl php-sodium php-gmp

#Special Brice POTE le 14/07/2020
RUN apt-get -y --no-install-recommends install  wget git dos2unix sshpass tree yarn vim mysql-client openssh-client

# Cleaing the sources packets
RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

#Special Brice POTE le 01/01/2021 - Install Symfony bin
RUN wget https://get.symfony.com/cli/installer -O - | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

#Special Brice POTE le 14/07/2020
COPY ./cls /usr/bin/cls
COPY ./lt /usr/bin/lt
COPY ./install_composer.sh /usr/bin/install_composer
RUN chmod 755 /usr/bin/cls
RUN chmod 755 /usr/bin/lt
RUN chmod 755 /usr/bin/install_composer

#Special Brice POTE le 14/07/2020 Avoid conflict Window/Linux
RUN dos2unix /usr/bin/cls
RUN dos2unix /usr/bin/lt
RUN dos2unix /usr/bin/install_composer

#Special Brice POTE le 05/02/2021 Install properly composer
RUN install_composer

