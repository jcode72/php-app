from php:7.0-fpm 

COPY ./provision/www.conf /etc/php/7.0/fpm/pool.d/www.conf
 
COPY ../src/index.php /usr/share/nginx/html
 
RUN docker-php-ext-install mysqli pdo pdo_mysql  && docker-php-ext-enable pdo_mysql
