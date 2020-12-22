

composer.install:
	composer install --prefer-source


################
#   QA TOOLS   #
################
phpunit.run: phpunit.text

phpunit.html:
	vendor/bin/phpunit test --bootstrap vendor/autoload.php --coverage-html coverage --coverage-filter src --colors always

phpunit.text:
	vendor/bin/phpunit test --bootstrap vendor/autoload.php --verbose --coverage-text --coverage-filter src --colors always

psalm.run:
	vendor/bin/psalm --show-info=true

psalm.alter:
	vendor/bin/psalm --alter --issues=all

phpcs.run:
	vendor/bin/php-cs-fixer fix --config .php_cs --allow-risky=yes src test

qa: phpcs.run psalm.run

test: qa phpunit.run


