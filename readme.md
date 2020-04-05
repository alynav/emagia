### Emagia Game

1. clone repository 
``git clone git@github.com:alynav/emagia.git``

2. start docker command 
``docker-compose up -d``

3. run composer
``docker-compose exec php-fpm composer install``

4. start game command
``docker-compose exec php-fpm php public/index.php``

5. run tests command
``docker-compose exec php-fpm php ./vendor/bin/phpunit tests/PlayerTest.php``
