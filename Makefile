SHELL:=/bin/bash
-include Makefile.env.dist

.SILENT:
.DEFAULT_GOAL := help

.PHONY: setup
setup: restart composer-install                                    ## Setup the Docker environment

.PHONY: start
start:                                                                             ## Start the Docker environment
	export DOCKER_BUILDKIT=1
	docker compose -f ${DOCKER_COMPOSE_FILE_DIR} up --build -d

.PHONY: stop
stop:                                                                              ## Stop the Docker environment
	docker compose -f ${DOCKER_COMPOSE_FILE_DIR} down --remove-orphans

.PHONY: restart
restart: stop start                                                               ## Restart the Docker environment

.PHONY: status
status:                                                                          ## Show weather the Docker services are running or not
	docker compose -f ${DOCKER_COMPOSE_FILE_DIR} ps --all

.PHONY: console
console:                                                                         ## Open a bash console in the php Docker environment
	docker compose -f ${DOCKER_COMPOSE_FILE_DIR} exec $(ARGS) php sh

.PHONY: clean
clean: clean-cache clean-log                                                    ## Clean any generated file
	cd app
	rm -rf .phpunit.result.cache \
      phpunit.xml reports vendor
.PHONY: clean-cache
clean-cache: start                                                               ## Clean cache directories
	cd app
	rm -f .php_cs.cache .phpunit.result.cache

.PHONY: composer-bump-deps
composer-bump-deps:                                                             ## Run composer bump
	cd app
	${BIN_PHP} ./composer.phar bump --ansi

.PHONY: composer-check
composer-check:                                                                 ## Check information about the current system to identify common errors
	cd app
	${BIN_PHP} ./composer.phar diagnose --ansi

.PHONY: composer-install
composer-install:                                                               ## Run composer install
	cd app
	${BIN_PHP} ./composer.phar install --ansi --no-interaction --no-scripts

.PHONY: composer-update
composer-update:                                                                ## Run composer update
	cd app
	${BIN_PHP} ./composer.phar update --ansi --no-interaction --no-scripts

.PHONY: test
test:                                                                           ## Run all the test suites
	${BIN_PHP} ./vendor/bin/phpunit $(ARGS)

.PHONY: test-unit
test-unit:                                                                      ## Run the unit tests
	${BIN_PHP} ./vendor/bin/phpunit --testsuite=Unit $(ARGS) --testdox

.PHONY: help
help:                                                                           ## Show this help
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_\-\.]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)
