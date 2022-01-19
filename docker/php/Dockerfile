FROM bitnami/php-fpm:latest
ARG TIMEZONE

RUN apt-get update && apt-get install -y openssl git unzip vim wget

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer config --global --auth gitlab-token.gitlab.com Up5ZXTzF9yeVzfCxpetz

RUN wget https://get.symfony.com/cli/installer -O - | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

WORKDIR /var/www/vhosts
