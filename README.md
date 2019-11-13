Symfony + GrumPHP
==============
`symfony-grumphp` is configured GrumPHP with bunch of tools for static code analysis mainly based on [PSRs](https://www.php-fig.org/psr/) + [Symfony Coding Standards](https://symfony.com/doc/current/contributing/code/standards.html) for Symfony Framework 4 projects.

[![GitHub release (latest SemVer)](https://img.shields.io/github/v/release/sci3ma/symfony-grumphp?style=flat-square)](https://github.com/sci3ma/symfony-grumphp)
[![GitHub](https://img.shields.io/github/license/sci3ma/symfony-grumphp?style=flat-square)](https://github.com/sci3ma/symfony-grumphp/blob/master/LICENSE)
[![Packagist (custom server)](https://img.shields.io/packagist/dt/sci3ma/symfony-grumphp?style=flat-square)](https://packagist.org/packages/sci3ma/symfony-grumphp/stats)
[![GitHub last commit](https://img.shields.io/github/last-commit/sci3ma/symfony-grumphp?style=flat-square&logo=github)](https://github.com/sci3ma/symfony-grumphp/commits/master)
[![Travis (.org)](https://img.shields.io/travis/sci3ma/symfony-grumphp?style=flat-square&logo=travis-ci)](https://travis-ci.org/sci3ma/symfony-grumphp)

Included tools
--------------
* [GrumPHP](https://github.com/phpro/grumphp): `phpro/grumphp`
* [PhpCpd](https://github.com/sebastianbergmann/phpcpd): `sebastian/phpcpd`
* [PHP-CS-FIXER](https://github.com/FriendsOfPHP/PHP-CS-Fixer): `friendsofphp/php-cs-fixer`
* [PHPLint](https://github.com/JakubOnderka/PHP-Parallel-Lint): `jakub-onderka/php-parallel-lint`
* [PhpMd](https://github.com/phpmd/phpmd): `phpmd/phpmd`
* [PhpMnd](https://github.com/povils/phpmnd): `povils/phpmnd`
* [PHPStan](https://github.com/phpstan/phpstan): `phpstan/phpstan`
    * [Doctrine extension](https://github.com/phpstan/phpstan-doctrine): `phpstan/phpstan-doctrine`
    * [PHPUnit extension](https://github.com/phpstan/phpstan-phpunit): `phpstan/phpstan-phpunit`
    * [Symfony Framework extension](https://github.com/phpstan/phpstan-symfony): `phpstan/phpstan-symfony`
    * [TheCodingMachine's additional rules](https://github.com/thecodingmachine/phpstan-strict-rules): `thecodingmachine/phpstan-strict-rules`
* [PHPUnit Bridge](https://github.com/symfony/phpunit-bridge): `symfony/phpunit-bridge`
    * With Clover Coverage and percentage code coverage check
* [SensioLabs Security Checker](https://github.com/sensiolabs/security-checker): `sensiolabs/security-checker`

Requirements
------------
PHP needs to be a minimum version of PHP 7.1.  
Symfony Framework needs to be a minimum version of Symfony Framework 4.0.

Install
-------
To install `symfony-grumphp`, [install Composer](https://getcomposer.org/download/), execute the following command:
```
composer require --dev sci3ma/symfony-grumphp
```
and create (or update) configuration files:
```
./vendor/bin/symfony-grumphp install
```

Configure
---------
GrumPHP should be enabled by default but you can also enable GrumPHP yourself:
```
./vendor/bin/grumphp git:init
```
Disable GrumPHP:
```
./vendor/bin/grumphp git:deinit
```
You can find more GrumPHP configuration [here](https://github.com/phpro/grumphp/blob/master/doc/commands.md#installation).

Uninstall
---------
Remove configuration files:
```
./vendor/bin/symfony-grumphp uninstall
```
Then remove package:
```
composer remove sci3ma/symfony-grumphp
```

Force run
---------
You can run tests/checks without commit manually:
```
./vendor/bin/grumphp run
```

Update notice
-------------
This library has been renamed to `sci3ma/symfony-grumphp` since 2019.11.10
 
