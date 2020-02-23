# make for windows http://gnuwin32.sourceforge.net/packages/make.htm
DC = cd deploy && docker-compose
COMPOSER = $(DC) exec php composer

install:
	$(DC) up -d --build
	$(composer) install
up:
	$(DC) up -d
bash:
	$(DC) exec php sh
down:
	$(DC) down
test:
	$(DC) run php php bin/phpunit