SF4GrumPHP
==========

Configured GrumPHP with bunch of tools for static code analysis (PSR + symfony standards) of Symfony Framework 4.* projects.

Included tools
--------------

* [GrumPHP][1]: `phpro/grumphp`
* [PhpCpd][2]: `sebastian/phpcpd`
* [PHP-CS-FIXER][3]: `friendsofphp/php-cs-fixer`
* [PHPLint][4]: `jakub-onderka/php-parallel-lint`
* [PhpMd][5]: `phpmd/phpmd`
* [PhpMnd][6]: `povils/phpmnd`
* [PHPStan][7]: `phpstan/phpstan`
    * [Doctrine extension][8]: `phpstan/phpstan-doctrine`
    * [PHPUnit extension][9]: `phpstan/phpstan-phpunit`
    * [Symfony Framework extension][10]: `phpstan/phpstan-symfony`
* [PHPUnit Bridge][11]: `symfony/phpunit-bridge`
* [SensioLabs Security Checker][12]: `sensiolabs/security-checker`

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
More configuration [here][13].

Uninstall
---------
Remove configuration files:
```
./vendor/bin/sf4grumphp uninstall
```
Remove package:
```
composer remove sci3ma/sf4grumphp
```

Force run
---------
Run tests without commit:
```
./vendor/bin/grumphp run
```

[1]: https://github.com/phpro/grumphp
[2]: https://github.com/sebastianbergmann/phpcpd
[3]: https://github.com/FriendsOfPHP/PHP-CS-Fixer
[4]: https://github.com/JakubOnderka/PHP-Parallel-Lint
[5]: https://github.com/phpmd/phpmd
[6]: https://github.com/povils/phpmnd
[7]: https://github.com/phpstan/phpstan
[8]: https://github.com/phpstan/phpstan-doctrine
[9]: https://github.com/phpstan/phpstan-phpunit
[10]: https://github.com/phpstan/phpstan-symfony
[11]: https://github.com/symfony/phpunit-bridge
[12]: https://github.com/sensiolabs/security-checker
[13]: https://github.com/phpro/grumphp/blob/master/doc/commands.md#installation
