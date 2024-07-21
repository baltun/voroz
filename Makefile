PHP_CONTAINER=gsoft_php8
HOST_USER=1000:1000

.PHONY: install
install:
	docker exec -u $(HOST_USER) -it $(PHP_CONTAINER) '/var/www/$(shell basename $(CURDIR))/composer install'
	docker exec -u $(HOST_USER) -it $(PHP_CONTAINER) 'php /var/www/$(shell basename $(CURDIR))/artisan migrate'
	docker exec -u $(HOST_USER) -it $(PHP_CONTAINER) 'php /var/www/$(shell basename $(CURDIR))/artisan db:seed'

.PHONY: admin_create
admin_create:
	docker exec -u $(HOST_USER) -it $(PHP_CONTAINER) bash -c 'cd /var/www/$(shell basename $(CURDIR))/; php artisan db:seed --class=UserSeeder'

.PHONY: command
command:
	docker exec -u $(HOST_USER) -it $(PHP_CONTAINER) bash -c 'cd /var/www/$(shell basename $(CURDIR))/; $(filter-out $@,$(MAKECMDGOALS))'

.PHONY: artisan
artisan:
	docker exec -u $(HOST_USER) -it $(PHP_CONTAINER) bash -c 'cd /var/www/$(shell basename $(CURDIR))/; php artisan $(filter-out $@,$(MAKECMDGOALS))'

.PHONY: log
log:
	tail -n100 ./storage/logs/laravel.log

.PHONY: test
test:
	docker exec -u $(HOST_USER) -it $(PHP_CONTAINER) bash -c 'cd /var/www/$(shell basename $(CURDIR))/; php artisan test --do-not-cache-result -c phpunit.xml'

.PHONY: composer
composer:
	docker exec -u root:root -it $(PHP_CONTAINER) bash -c 'cd /var/www/$(shell basename $(CURDIR))/; composer $(filter-out $@,$(MAKECMDGOALS))'

.PHONY: crud_console
crud_console:
	docker exec -u $(HOST_USER) -it $(PHP_CONTAINER) bash -c 'cd /var/www/$(shell basename $(CURDIR))/; php artisan infyom:api_scaffold $(filter-out $@,$(MAKECMDGOALS))'

.PHONY: crud_console_rollback
crud_console_rollback:
	docker exec -u $(HOST_USER) -it $(PHP_CONTAINER) bash -c 'cd /var/www/$(shell basename $(CURDIR))/; php artisan infyom:rollback $(filter-out $@,$(MAKECMDGOALS)) api_scaffold'

.PHONY: crud_file
crud_file:
	docker exec -u $(HOST_USER) -it $(PHP_CONTAINER) bash -c 'cd /var/www/$(shell basename $(CURDIR))/; php artisan infyom:api_scaffold  --fieldsFile=./resources/model_schemas/$(filter-out $@,$(MAKECMDGOALS)).json $(filter-out $@,$(MAKECMDGOALS))'

.PHONY: queues_start
queues_start:
	#docker exec -u $(HOST_USER) -it $(PHP_CONTAINER) bash -c 'cd /var/www/$(shell basename $(CURDIR))/; supervisor $(filter-out $@,$(MAKECMDGOALS))'

