#!/bin/bash

# ------------------------------------------------
# Variables
# ------------------------------------------------
PROJECT_NAME=podpoint-api
DB_NAME=podpointapi
PROJECT_DIR=/var/www/html/
DOCKER_HOST_IP=172.17.0.1
DATE_TIMEZONE=Europe/London

# ------------------------------------------------
# Managing needed modules
# ------------------------------------------------
apt-get update -y
apt-get install -y php-mbstring

# ------------------------------------------------
# Prepare php.ini
# ------------------------------------------------
sed -i 's|^;date.timezone =|date.timezone = '${DATE_TIMEZONE}'|' /etc/php/7.0/apache2/php.ini
sed -i 's|^;date.timezone =|date.timezone = '${DATE_TIMEZONE}'|' /etc/php/7.0/cli/php.ini

# ------------------------------------------------
# Start MySQL
# ------------------------------------------------
service mysql restart

# ------------------------------------------------
# Create users & grant permissions
# ------------------------------------------------
mysql -e "CREATE DATABASE ${DB_NAME} CHARACTER SET utf8 COLLATE utf8_bin"
mysql -e "CREATE USER '${DB_NAME}'@'%' IDENTIFIED BY PASSWORD '*FF9B8F160276B208CDFFFF7978FF1EB5FF3751C4';" #azertyuiop1234567890!
mysql -e "GRANT ALL ON ${DB_NAME}.* TO '${DB_NAME}'@'%';"
mysql -e "FLUSH PRIVILEGES;"

# ------------------------------------------------
# Prepare project
# ------------------------------------------------
composer install --no-interaction

# ------------------------------------------------
# Restart Apache service
# ------------------------------------------------
service apache2 reload

# ------------------------------------------------
# Start Apache
# ------------------------------------------------
apachectl -DFOREGROUND
