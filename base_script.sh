#!/bin/bash

# shits and giggles #
alias fucking=sudo

apt-get update
apt-get -y install python-software-properties

curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -

# add needed repos and update #
add-apt-repository -y ppa:ondrej/php
apt-get update

# basic tools #
apt-get -y install vim curl nginx sqlite

# install php and enable it should be v7.0#
apt-get -y install php7.1 php7.1-fpm php-mcrypt php-curl php-gd php-imap php-xdebug php-xml php-mbstring php-zip php-soap php7.1-bcmath
phpenmod mcrypt
phpenmod gd
phpenmod imap

# configure php upload file size to something more usable
sed -i "s/upload_max_filesize = 2M/upload_max_filesize = 128M/" /etc/php/7.1/fpm/php.ini
sed -i "s/upload_max_filesize = 2M/upload_max_filesize = 128M/" /etc/php/7.1/cli/php.ini
sed -i "s/post_max_size = 8M/post_max_size = 128M/" /etc/php/7.1/fpm/php.ini
sed -i "s/post_max_size = 8M/post_max_size = 128M/" /etc/php/7.1/cli/php.ini

service php7.1-fpm restart
service nginx restart

apt-get -y instll redis-server

echo "xdebug.remote_enable = 1" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.remote_connect_back = 1" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.remote_port = 9000" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.scream=0" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.cli_color=1" >> /etc/php/7.1/mods-available/xdebug.ini
echo "xdebug.show_local_vars=1" >> /etc/php/7.1/mods-available/xdebug.ini

# install mysql-server #
debconf-set-selections <<< 'mysql-server mysql-server/root_password password Test1234'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password Test1234'
apt-get -y install mysql-server php-mysql

# add root user to specific IP to differentiate between vagrant boxes #
mysql -uroot -pTest1234 -e "CREATE USER 'root'@'%' IDENTIFIED BY 'Test1234'; GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;"

# create db #
mysql -uroot -pTest1234 -e "CREATE DATABASE laravel55-base CHARSET utf8 COLLATE utf8_unicode_ci;"

# add permissions to root for tables #
mysql -uroot -pTest1234 -e "GRANT ALL PRIVILEGES ON laravel55-base.* TO 'root'@'localhost';"

# change mysql config  #
sed -i "s/bind-address.*/bind-address = 0.0.0.0/" /etc/mysql/mysql.conf.d/mysqld.cnf
sed -i "s/max_allowed_packet.*/max_allowed_packet = 128M/" /etc/mysql/mysql.conf.d/mysqld.cnf

# restart mysql #
service mysql restart

npm set progress=false

# install composer globally #
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# install git #
apt-get -y install git

apt-get autoclean

# site config copy
cp /var/www/laravel5.5-base/site.conf /etc/nginx/sites-enabled/local.laravel5.5-base.conf

service nginx restart