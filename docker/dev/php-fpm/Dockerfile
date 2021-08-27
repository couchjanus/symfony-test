FROM php:8.0-fpm

RUN apt-get -y update \ 
    && apt-get install -y zlib1g-dev g++ gnupg git libicu-dev zip libzip-dev libssl-dev libxml2-dev libpq-dev sudo libcurl4  \
    && docker-php-ext-install -j$(nproc) intl opcache \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip 

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host = host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini 

# Install SQL Server extensions

RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
&& curl https://packages.microsoft.com/config/ubuntu/16.04/prod.list | tee /etc/apt/sources.list.d/msprod.list 

RUN apt-get update \
&& apt-get install -y --no-install-recommends locales apt-transport-https \
&& echo "en_US.UTF-8 UTF-8" > /etc/locale.gen \
&& locale-gen 

RUN ACCEPT_EULA=Y apt-get install -y unixodbc-dev mssql-tools
RUN apt-get install -y unixodbc-dev libgssapi-krb5-2
RUN pecl install sqlsrv
RUN pecl install pdo_sqlsrv
RUN docker-php-ext-enable sqlsrv
RUN docker-php-ext-enable pdo_sqlsrv

ENV TZ=Europe/Kiev
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN date

# yarn
# node

RUN curl https://deb.nodesource.com/setup_16.x | bash
RUN curl https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list

RUN apt-get update && apt-get install -y nodejs yarn

# update npm to last version
# RUN npm i -g npm


WORKDIR /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quiet

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

RUN git config --global user.email "couchjanus@gmail.com" && \ 
    git config --global user.name "couchjanus"

RUN useradd -rm -d /home/www -s /bin/bash -g root -G sudo -u 1000 www
USER www


EXPOSE 9000
