#!/usr/bin/env sh

envsubst '\$APP_DOMAIN \$PHP_FPM_HOST' < /nginx.conf.tpl > /etc/nginx/nginx.conf

nginx -g "daemon off;"
