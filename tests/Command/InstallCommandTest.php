<?php

declare(strict_types=1);

namespace MH\SymfonyGrumPHP\Tests\Command;

use MH\SymfonyGrumPHP\Command\InstallCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class InstallCommandTest extends TestCase
{
    public function testName()
    {
        $command = new InstallCommand();

        $this->assertSame('install', $command->getName());
    }

    public function testExecute()
    {
        $application = new Application();
        $application->add(new InstallCommand());

        $command = $application->find('install');
        $commandTester = new CommandTester($command);
        $commandTester->setInputs(['yes', 'yes', 'yes', 'yes', 'yes']);
        $commandTester->execute(['command' => $command->getName()]);

        $this->assertSame(0, $commandTester->getStatusCode());

        $expectedOutput =
            'File [grumphp.yml] exists. Do you want override file? (yes/no) [yes]: File [grumphp.yml] has been created.
File [php_cs.php] exists. Do you want override file? (yes/no) [yes]: File [php_cs.php] has been created.
File [phpstan.neon] exists. Do you want override file? (yes/no) [yes]: File [phpstan.neon] has been created.
File [phpunit.xml.dist] exists. Do you want override file? (yes/no) [yes]: File [phpunit.xml.dist] has been created.
File [coverage.sh] exists. Do you want override file? (yes/no) [yes]: File [coverage.sh] has been created.
';
        $this->assertSame($expectedOutput, $commandTester->getDisplay());
    }
}
