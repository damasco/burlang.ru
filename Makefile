up: docker-up
down: docker-down
restart: down up
ps: docker-ps
init: docker-down-clear docker-pull docker-build docker-up app-init
update-deps: app-composer-update app-npm-update restart

docker-up:
	docker-compose up -d
docker-down:
	docker-compose down --remove-orphans
docker-down-clear:
	docker-compose down -v --remove-orphans
docker-pull:
	docker-compose pull
docker-build:
	docker-compose build --pull
docker-ps:
	docker-compose ps

app-init: app-composer-install app-npm-install app-init-files app-migrate
app-init-files:
	docker-compose run --rm app init --env=Development --overwrite=n
app-composer-install:
	docker-compose run --rm app composer install
app-composer-update:
	docker-compose run --rm app composer update
app-migrate:
	docker-compose run --rm app yii migrate --interactive=0
app-cs-fix:
	docker-compose run --rm app composer phpcs-fixer
app-npm-install:
	docker-compose run --rm app npm install
app-npm-update:
	docker-compose run --rm app npm update
app-assets-build:
	docker-compose run --rm app npm run build
app-assets-build-dev:
	docker-compose run --rm app npm run build-dev
app-assets-watch:
	docker-compose run --rm app npm run watch	
