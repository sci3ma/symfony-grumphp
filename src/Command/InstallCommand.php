<?php

namespace MH\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @author Marcin Harasim <marcin.harasim@gmail.com>
 */
final class InstallCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}
     */
    protected static $defaultName = 'install';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setDescription('Create configuration files of SF4GrumPHP')
            ->setHelp('The <info>install</info> command moves preconfigured files to root folder of a project.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $filesystem = new Filesystem();
        foreach (self::CONF_FILES as $file) {
            $sourceFile = self::normalizeSourceFile($file);
            $destinationFile = self::normalizeDestinationFile($file);

            if ($filesystem->exists($destinationFile)) {
                $questionOverride = new ConfirmationQuestion(
                    sprintf('File [%s] exists. Do you want override file? (yes/no) [yes]: ', $file)
                );

                if ($helper->ask($input, $output, $questionOverride)) {
                    $filesystem->rename($destinationFile, sprintf('%s.scbak', $destinationFile), true);
                }
            }

            $filesystem->copy($sourceFile, $destinationFile);
            $output->writeln(sprintf('File [%s] has been created.', $file));
        }
    }
}
