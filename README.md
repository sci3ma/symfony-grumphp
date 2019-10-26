SymfonyGrumPHP
==============
Configured GrumPHP with bunch of tools for static code analysis (PSR + symfony standards) of Symfony Framework 4.* projects.

![GitHub release (latest SemVer)](https://img.shields.io/github/v/release/sci3ma/symfony-grumphp?style=flat-square)
![GitHub](https://img.shields.io/github/license/sci3ma/symfony-grumphp?style=flat-square)
![Packagist (custom server)](https://img.shields.io/packagist/dt/sci3ma/symfony-grumphp?style=flat-square)
![GitHub last commit](https://img.shields.io/github/last-commit/sci3ma/symfony-grumphp?style=flat-square)

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
* [PHPUnit Bridge](https://github.com/symfony/phpunit-bridge): `symfony/phpunit-bridge`
* [SensioLabs Security Checker](https://github.com/sensiolabs/security-checker): `sensiolabs/security-checker`

Install
-------
Download package:
```
composer require --dev sci3ma/symfony-grumphp
```
Create/update configuration files:
```
./vendor/bin/symfony-grumphp install
```

Configure
---------
Enable GrumPHP:
```
./vendor/bin/grumphp git:init
```
Disable GrumPHP:
```
./vendor/bin/grumphp git:deinit
```
You can find more configuration [here](https://github.com/phpro/grumphp/blob/master/doc/commands.md#installation).

Uninstall
---------
Remove configuration files:
```
./vendor/bin/symfony-grumphp uninstall
```
Remove package:
```
composer remove sci3ma/symfony-grumphp
```

Force run
---------
Run tests without commit:
```
./vendor/bin/grumphp run
```

Update notice
-------------
This library has been renamed to `sci3ma/symfony-grumphp` since 2019.10.26
