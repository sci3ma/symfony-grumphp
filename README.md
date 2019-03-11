SF4GrumPHP
==========

Configured GrumPHP with bunch of tools for static code analysis (PSR + symfony standards) of Symfony Framework 4.* projects.

Included tools
--------------

* GrumPHP: `phpro/grumphp`
* PhpCpd: `sebastian/phpcpd`
* PHP-CS-FIXER: `friendsofphp/php-cs-fixer`
* PHPLint: `jakub-onderka/php-parallel-lint`
* PhpMd: `phpmd/phpmd`
* PhpMnd: `povils/phpmnd`
* PHPStan: `phpstan/phpstan`
    * Doctrine extension: `phpstan/phpstan-doctrine`
    * PHPUnit extension: `phpstan/phpstan-phpunit`
    * Symfony Framework extension`phpstan/phpstan-symfony`
* PHPUnit: `phpunit/phpunit`
* SensioLabs Security Checker: `sensiolabs/security-checker`

Install
-----------
Download package:
```
composer require --dev sci3ma/sf4grumphp
```
Create/update configuration files:
```
./vendor/bin/sf4grumphp install
```

Configure
-------------
Enable GrumPHP:
```
./vendor/bin/grumphp git:init
```
Disable GrumPHP:
```
./vendor/bin/grumphp git:deinit
```
More configuration [here][1].

Uninstall
---------
Remove configuration files:
```
./vendor/bin/sf4grumph uninstall
```
Remove package:
```
composer remove sci3ma/sf4grumphp
```

Force run
---------
Run tests without commit:
```
./vendor/bin/grump run
```

[1]: https://github.com/phpro/grumphp/blob/master/doc/commands.md#installation