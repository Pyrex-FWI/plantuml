

composer.install:
	composer install --prefer-source


################
#   QA TOOLS   #
################
test.phpunit: test.phpunit.text

test.phpunit.html:
	vendor/bin/phpunit test --bootstrap vendor/autoload.php --coverage-html coverage --coverage-filter src --colors always

test.phpunit.text:
	vendor/bin/phpunit test --bootstrap vendor/autoload.php --verbose --coverage-text --coverage-filter src --colors always