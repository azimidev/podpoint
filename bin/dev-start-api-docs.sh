#!/bin/bash

# ------------------------------------------------
# Variables
# ------------------------------------------------
PROJECT_NAME=podpoint-api-docs
PROJECT_DIR=/var/www/html/
DOCKER_HOST_IP=172.17.0.3
DATE_TIMEZONE=Europe/London

# ------------------------------------------------
# Managing needed modules
# ------------------------------------------------
apt-get update -y

# ------------------------------------------------
# Prepare php.ini
# ------------------------------------------------
sed -i 's|^;date.timezone =|date.timezone = '${DATE_TIMEZONE}'|' /etc/php/7.0/apache2/php.ini
sed -i 's|^;date.timezone =|date.timezone = '${DATE_TIMEZONE}'|' /etc/php/7.0/cli/php.ini

# ------------------------------------------------
# Stop unnecessary services
# ------------------------------------------------
service mysql stop

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
