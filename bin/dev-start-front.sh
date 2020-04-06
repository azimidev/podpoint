#!/bin/bash

# ------------------------------------------------
# Variables
# ------------------------------------------------
PROJECT_NAME=podpoint-front
PROJECT_DIR=/var/www/html/
DOCKER_HOST_IP=172.17.0.2
DATE_TIMEZONE=Europe/London

# ------------------------------------------------
# Managing needed modules
# ------------------------------------------------
curl -sL https://deb.nodesource.com/setup_8.x | bash -
apt-get update -y
apt-get install -y nodejs

# ------------------------------------------------
# Stop unnecessary services
# ------------------------------------------------
service mysql stop

# ------------------------------------------------
# Prepare App
# ------------------------------------------------
npm install
npm run start

# ------------------------------------------------
# Restart Apache service
# ------------------------------------------------
service apache2 reload

# ------------------------------------------------
# Start Apache
# ------------------------------------------------
apachectl -DFOREGROUND

