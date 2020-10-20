GIT_ESCAPED_BRANCH ?= none
APP_NAME ?= portfolio

.PHONY: default

.DEFAULT:
	@echo 'Invalid target.'

default: .DEFAULT

# components
fpm:
	docker build --pull \
		. -f docker/fpm/Dockerfile \
		-t portfolio:fpm

nginx:
	docker build --pull \
		. -f docker/nginx/Dockerfile \
		-t portfolio:nginx

# stages
local-base: fpm nginx

local: local-base
	docker-compose up -d

local-down:
	docker-compose down -v

local-reset: local-down local
