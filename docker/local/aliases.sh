#!/bin/bash
PROJECT_NAME="eindwerk-api"
DOCKER_PATH="/home/wouter/lokalhost/projects/eindwerk-api/docker/local"
IN_DOCKER_PATH="/var/www/php"

alias da="cd $DOCKER_PATH && docker-compose exec php php $IN_DOCKER_PATH/artisan"
alias dc="cd $DOCKER_PATH && docker-compose exec php composer"
echo "available aliases: da, dc"