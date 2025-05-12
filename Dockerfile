#$ sudo apt install -y php-mysql
FROM php:8.2-apache

RUN docker-php-ext-install pdo_mysql

# RUN echo "ServerName localhost" | tee /etc/apache2/conf-available/fqdn.conf
# RUN a2enconf fqdn

#RUN apt install -y php-mysql
