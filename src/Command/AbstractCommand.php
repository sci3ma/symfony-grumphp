<?php

namespace MH\Command;

use Symfony\Component\Console\Command\Command;

abstract class AbstractCommand extends Command
{
    /**
     * @const array CONF_FILES
     */
    protected const CONF_FILES = [
        'grumphp.yml',
        'php_cs.php',
        'phpstan.neon',
        'phpunit.xml',
    ];

    /**
     * @param string $file
     *
     * @return string
     */
    protected static function normalizeSourceFile(string $file): string
    {
        return sprintf(str_replace('/', DIRECTORY_SEPARATOR, '%s/../dist/%s'), __DIR__, $file);
    }

    /**
     * @param string $file
     *
     * @return string
     */
    protected static function normalizeDestinationFile(string $file): string
    {
        return sprintf(str_replace('/', DIRECTORY_SEPARATOR, '%s/%s'), getcwd(), $file);
    }
}
