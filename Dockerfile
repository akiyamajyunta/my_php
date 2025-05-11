#$ sudo apt install -y php-mysql
FROM php:8.2-apache

RUN docker-php-ext-install pdo_mysql

#RUN apt install -y php-mysql