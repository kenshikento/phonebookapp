CURRENT_DIR = $(shell pwd)

install: env-reset dependancies
	php artisan migrate:fresh --seed
	php artisan cache:clear
		
env-reset:
	cp .env.local .env

dependancies:
	composer install
	
setup-tests: clear-logs clean-storage dump-autoload

dump-autoload:
	@echo 'Running Autoloader...'
	@composer dump-autoload --quiet
	@echo 'Done.'

#! IF MAC OS USE / Instead of \ As i am using WINDOWS Enviroment
lint:
	.\vendor\bin\phpcs

test:
	.\vendor\bin\phpunit 