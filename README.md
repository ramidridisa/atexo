# cards game ATEXO

## Getting Started
1. 😀 Clone this repo.
2. Go inside project and run `docker compose up -d --build` to build and start containers.
3. Go Inside the `php` container `docker-compose exec --user www-data php bash`
4. Inside the `php` container, run `composer install` to install dependencies from `/var/www/symfony` folder.
5. Open `http://localhost:8080/cards`

## TESTS
Inside the `php` container, run `vendor/bin/phpunit`.
