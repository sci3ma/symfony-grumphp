<?php

declare(strict_types=1);

namespace MH\Composer;

use Composer\Script\Event;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @author Marcin Harasim <marcin.harasim@gmail.com>
 */
class Scripts
{
    /**
     * @param Event $event
     */
    public static function move(Event $event)
    {
        $files = [
            'grumphp.yml',
            'php_cs.php',
            'phpstan.neon',
            'phpunit.xml',
        ];

        $io = $event->getIO();

        if ($io->askConfirmation('Do you want to generate configuration files?')) {
            $filesystem = new Filesystem();
            foreach ($files as $file) {
                if (
                    $filesystem->exists($file) &&
                    $io->askConfirmation(sprintf('File [%s] exists. Do you want to backup and override file?', $file))
                ) {
                    $filesystem->rename($file, sprintf('%s.mhbak', $file), true);
                }

                $filesystem->copy($file, sprintf('vendor/sci3ma/sf4grumphp/%s', $file));
            }
        }

        $event->getIO()->write('All files has been created.');
    }
}
