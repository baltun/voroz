PHP_CONTAINER=gsoft_php8

.PHONY: install
install:
	docker exec -it $(PHP_CONTAINER) '/var/www/$(shell basename $(CURDIR))/composer install'
	docker exec -it $(PHP_CONTAINER) 'php /var/www/$(shell basename $(CURDIR))/artisan migrate'
	docker exec -it $(PHP_CONTAINER) 'php /var/www/$(shell basename $(CURDIR))/artisan db:seed'

.PHONY: admin_create
admin_create:
	docker exec $(PHP_CONTAINER) bash -c 'cd /var/www/$(shell basename $(CURDIR))/; php artisan db:seed --class=UserSeeder'

.PHONY: command
command:
	docker exec $(PHP_CONTAINER) bash -c 'cd /var/www/$(shell basename $(CURDIR))/; $(filter-out $@,$(MAKECMDGOALS))'

.PHONY: artisan
artisan:
	docker exec $(PHP_CONTAINER) bash -c 'cd /var/www/$(shell basename $(CURDIR))/; php artisan $(filter-out $@,$(MAKECMDGOALS))'

.PHONY: log
log:
	tail -n100 ./storage/logs/laravel.log

.PHONY: test
test:
	docker-compose exec $(PHP_CONTAINER) php artisan test --do-not-cache-result -c phpunit.xml

