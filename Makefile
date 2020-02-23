# make for windows http://gnuwin32.sourceforge.net/packages/make.htm
DC = cd deploy && docker-compose
COMPOSER = $(DC) exec -T php composer

install:
	$(DC) up -d --build
	$(composer) install
up:
	$(DC) up -d
bash:
	$(DC) exec -T php sh
down:
	$(DC) down
test:
	$(DC) run -T php php bin/phpunit