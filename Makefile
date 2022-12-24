PHP_CONTAINER=gsoft_php8

.PHONY: install
install:
	docker exec -it $(PHP_CONTAINER) '/var/www/$(shell basename $(CURDIR))/composer install'
	docker exec -it $(PHP_CONTAINER) 'php /var/www/$(shell basename $(CURDIR))/artisan migrate'

.PHONY: tests
tests:
	docker exec -it $(PHP_CONTAINER) 'php /var/www/$(shell basename $(CURDIR))/artisan'






.PHONY: up
up:
	bash pre-commit-init.sh
	docker-compose -f docker-compose.dev.yml up -d --remove-orphans

.PHONY: down
down:
	docker-compose -f docker-compose.dev.yml down --remove-orphans

.PHONY: composer-require
composer-require:
	docker exec -it adminka_app composer require --ignore-platform-req=ext-imap $(filter-out $@,$(MAKECMDGOALS))

.PHONY: linter
linter:
	php vendor/bin/php-cs-fixer -v fix --show-progress=dots

.PHONY: composer-install
composer-install:
	docker-compose exec adminka_app ./composer.phar install --ignore-platform-req=ext-imap

.PHONY: composer-update
composer-update:
	docker-compose exec adminka_app ./composer.phar update --ignore-platform-req=ext-imap $(filter-out $@,$(MAKECMDGOALS))

.PHONY: php
php:
	docker exec -it adminka_app bash

.PHONY: optimize
optimize:
	docker-compose exec adminka_app php artisan optimize

.PHONY: test
test:
	docker-compose exec adminka_app php artisan test --do-not-cache-result -c phpunit.xml

.PHONY: swagger
swagger:
	docker-compose exec adminka_app php artisan l5-swagger:generate

.PHONY: refresh
refresh:
	docker-compose exec adminka_app php artisan optimize:clear
	# Для того чтобы корректно подтягивались данные из phpunit.xml
	docker-compose exec adminka_app php artisan config:clear
	docker-compose exec adminka_app php artisan db:wipe --database pgsql_test
	docker-compose exec adminka_app php artisan migrate --database pgsql_test
	docker-compose exec adminka_app php artisan db:seed --database pgsql_test

.PHONY: command
command:
	docker-compose exec adminka_app $(filter-out $@,$(MAKECMDGOALS))

.PHONY: artisan
artisan:
	docker-compose exec adminka_app php artisan $(filter-out $@,$(MAKECMDGOALS))

.PHONY: command_dev
command_dev:
	sudo -u www-data docker-compose exec adminka_app $(filter-out $@,$(MAKECMDGOALS))

.PHONY: artisan_dev
artisan_dev:
	sudo -u www-data docker-compose exec adminka_app php artisan $(filter-out $@,$(MAKECMDGOALS))

.PHONY: log_dev
log_dev:
	tail -n500 ./storage/logs/laravel.log

.PHONY: stop_blackbox
stop_blackbox:
	docker stop dev_blackbox

.PHONY: docker-compose
docker-compose:
	docker-compose -f docker-compose.dev.yml $(filter-out $@,$(MAKECMDGOALS))

.PHONY: ps
ps:
	docker-compose -f docker-compose.dev.yml ps

.PHONY: docker-compose_dev
docker-compose_dev:
	sudo -u www-data docker-compose $(filter-out $@,$(MAKECMDGOALS))

.PHONY: ps_dev
ps_dev:
	sudo -u www-data docker-compose ps

.PHONY: docker_dev
docker_dev:
	sudo -u www-data docker $(filter-out $@,$(MAKECMDGOALS))

.PHONY: stop_queues
stop_queues:
	docker-compose stop adminka_callback_order adminka_callback_slot adminka_code_import adminka_code_import_row adminka_emc_import adminka_emc_import_row adminka_infoclinica adminka_infoclinica_schedule

# Команды для очистки кэша Laravel (/storage/framework/..)
.PHONY: framework-cache-clear
framework-cache-clear:
	docker-compose exec adminka_app rm -R ./storage/framework/cache/*

.PHONY: framework-views-clear
framework-views-clear:
	docker-compose exec adminka_app rm -R ./storage/framework/views/*

# Команды для очистки кэша bootstrap (/bootstrap/cache/..)
.PHONY: bootstrap-cache-all-clear
bootstrap-cache-all-clear:
	docker-compose exec adminka_app rm ./bootstrap/cache/*.php

admin_create:
	docker-compose exec adminka_app php artisan admin-user:create
