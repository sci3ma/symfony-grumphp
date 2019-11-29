<?php

declare(strict_types=1);

namespace MH\SymfonyGrumPHP\Tests\Command;

use MH\SymfonyGrumPHP\Command\InstallCommand;
use MH\SymfonyGrumPHP\Command\UninstallCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class UninstallCommandTest extends TestCase
{
    public function testName()
    {
        $command = new UninstallCommand();

        $this->assertSame('uninstall', $command->getName());
    }

    public function testExecute()
    {
        $application = new Application();
        $application->add(new UninstallCommand());

        $command = $application->find('uninstall');
        $commandTester = new CommandTester($command);
        $commandTester->setInputs(['yes', 'yes', 'yes', 'yes', 'yes']);
        $commandTester->execute(['command' => $command->getName()]);

        $this->assertSame(0, $commandTester->getStatusCode());

        $expectedOutput =
            'Do you want to remove configuration files? (yes/no) [yes]: Files [grumphp.yml, grumphp.yml.scbak] have been deleted.
Files [php_cs.php, php_cs.php.scbak] have been deleted.
Files [phpstan.neon, phpstan.neon.scbak] have been deleted.
Files [phpunit.xml.dist, phpunit.xml.dist.scbak] have been deleted.
';
        $this->assertSame($expectedOutput, $commandTester->getDisplay());

        // revert removed files
        $application->add(new InstallCommand());

        $command = $application->find('install');
        $commandTester = new CommandTester($command);
        $commandTester->setInputs(['yes', 'yes', 'yes', 'yes', 'yes']);
        $commandTester->execute(['command' => $command->getName()]);
    }
}
