#!/bin/bash

# ---------------------------------------
# Variables
# ---------------------------------------
PROJECT_DIR=`pwd`
API_BOOTSTRAP_SCRIPT_PATH=${PROJECT_DIR}/bin/dev-start-api.sh
API_DOCS_SWAGGER_JSON_PATH=${PROJECT_DIR}/support/api-docs-swagger.json
FRONT_BOOTSTRAP_SCRIPT_PATH=${PROJECT_DIR}/bin/dev-start-front.sh

# ---------------------------------------
# Check folders & files paths exist
# ---------------------------------------
if [ ! -d "$PROJECT_DIR" ]; then
    echo "Could not find directory ${PROJECT_DIR}"
    exit 1
fi

if [ ! -f "$API_BOOTSTRAP_SCRIPT_PATH" ]; then
    echo "Could not find bootstrap bash script (${API_BOOTSTRAP_SCRIPT_PATH})"
    exit 1
fi

if [ ! -f "$API_DOCS_SWAGGER_JSON_PATH" ]; then
    echo "Could not find swagger json file for API Docs (${API_DOCS_SWAGGER_JSON_PATH})"
    exit 1
fi

if [ ! -f "$FRONT_BOOTSTRAP_SCRIPT_PATH" ]; then
    echo "Could not find bootstrap bash script (${FRONT_BOOTSTRAP_SCRIPT_PATH})"
    exit 1
fi

# ---------------------------------------
# Kill existing container if existing
# ---------------------------------------
EXISTING_CONTAINER=`docker ps -af name=podpoint-api -q`

if [ ! -z "${EXISTING_CONTAINER}" ]
    then
        docker rm -f ${EXISTING_CONTAINER}
fi

EXISTING_CONTAINER=`docker ps -af name=podpoint-api-docs -q`

if [ ! -z "${EXISTING_CONTAINER}" ]
    then
        docker rm -f ${EXISTING_CONTAINER}
fi

EXISTING_CONTAINER=`docker ps -af name=podpoint-front -q`

if [ ! -z "${EXISTING_CONTAINER}" ]
    then
        docker rm -f ${EXISTING_CONTAINER}
fi

# ---------------------------------------
# Pull needed images
# ---------------------------------------
docker pull fauria/lamp
docker pull swaggerapi/swagger-ui

# ---------------------------------------
# Start containers
#
#  * Runs the container in the background
#  * Names the containers as "podpoint-api" & "podpoint-front"
#  * Sets the project's root as the working directory
#  * Mounts the project's root as a volume
#  * Mounts the apache VHost configuration file as a volume
#  * Runs the bootstrap scripts
# ---------------------------------------
# Api
docker run -d --name podpoint-api \
    -p 8000:80 \
    -w /var/www/html/ \
    -v ${API_BOOTSTRAP_SCRIPT_PATH}:/bin/dev-start-api.sh \
    -v ${PROJECT_DIR}/api:/var/www/html/ \
    -it fauria/lamp bash /bin/dev-start-api.sh

# Api Docs
docker run -d --name podpoint-api-docs \
    -p 8001:8080 \
    -v ${API_DOCS_SWAGGER_JSON_PATH}:/tmp/api-docs-swagger.json \
    -e SWAGGER_JSON=/tmp/api-docs-swagger.json \
    -it swaggerapi/swagger-ui

# Front end
docker run -d --name podpoint-front \
    -p 8080:80 \
    -w /var/www/html/ \
    -v ${FRONT_BOOTSTRAP_SCRIPT_PATH}:/bin/dev-start-front.sh \
    -v ${PROJECT_DIR}/front/public:/var/www/html/ \
    -it fauria/lamp bash /bin/dev-start-front.sh
