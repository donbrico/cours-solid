.PHONY: help

env ?= dev

BRANCH_NAME ?= $(branch_name)

## Colors
COLOR_RESET			= \033[0m
COLOR_ERROR			= \033[31m
COLOR_INFO			= \033[32m
COLOR_COMMENT		= \033[33m
COLOR_TITLE_BLOCK	= \033[0;44m\033[37m

#---SYMFONY--#
SYMFONY_CONSOLE = symfony console
#------------#

#---SYMFONY--#
DOCKER_PHP = docker exec -it sf5-php
#------------#



#---PHP CLI--#
PHP_CLI = php -d memory_limit=4G
#------------#


#---PHPUNIT-#
PHPUNIT = APP_ENV=test php bin/phpunit
#------------#


# ---- DB - #
DB = docker exec -it sf5-mysql
#------------#

## === 🆘 HELP ==================================================
help: ## Show this help.
	@echo "Symfony-Makefile"
	@echo "---------------------------"
	@echo "Usage: make [target]"
	@echo ""
	@echo "Targets:"
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
#---------------------------------------------#


sf-clear: ## Clear symfony cache.
	$(SYMFONY_CONSOLE) cache:clear
.PHONY: sf-clear


## === 🆘 MASS USER IMPORT ========================================
import-user: ## execute mass user import
	$(SYMFONY_CONSOLE) app:mass-user-import

send-mails: ## handle Messenger Mailer queue
	$(SYMFONY_CONSOLE) app:send-mail-queue

fake-import-user: ## execute mass user import
	$(SYMFONY_CONSOLE) app:user-import-csv-generator $(company) $(nb_lines) -i