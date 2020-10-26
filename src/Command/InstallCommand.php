<?php

declare(strict_types=1);

namespace MH\SymfonyGrumPHP\Command;

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
    protected function configure(): void
    {
        $this
            ->setDescription('Create configuration files of SymfonyGrumPHP')
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

            if ('phpstan.neon' === $file) {
                $this->modifyNeonFile($destinationFile);
            }

            $output->writeln(sprintf('File [%s] has been created.', $file));
        }

        return 0;
    }

    /**
     * @param string $destinationFile
     */
    private function modifyNeonFile(string $destinationFile): void
    {
        $symfonyKernel = 'Symfony\Component\HttpKernel\Kernel';
        if (class_exists($symfonyKernel)) {
            $containerXmlPath = '%rootDir%/../../../var/cache/dev/srcDevDebugProjectContainer.xml';

            if (version_compare($symfonyKernel::VERSION, '4.2.0', '>=')) {
                $containerXmlPath = '%rootDir%/../../../var/cache/dev/srcApp_KernelDevDebugContainer.xml';
            }

            if (version_compare($symfonyKernel::VERSION, '5.0.0', '>=')) {
                $containerXmlPath = '%rootDir%/../../../var/cache/dev/App_KernelDevDebugContainer.xml';
            }

            if (version_compare($symfonyKernel::VERSION, '5.2.0', '>=')) {
                $containerXmlPath = '%rootDir%/../../../var/cache/dev/App_KernelDevDebugContainer.php';
            }

            file_put_contents($destinationFile, sprintf('    symfony:%s', PHP_EOL), FILE_APPEND);
            file_put_contents($destinationFile, sprintf('        container_xml_path: %s', $containerXmlPath), FILE_APPEND);
        }
    }
}
