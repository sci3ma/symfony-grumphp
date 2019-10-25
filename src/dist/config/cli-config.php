<?php

declare(strict_types=1);

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;

require_once 'bootstrap.php';

$config = Setup::createAnnotationMetadataConfiguration(
    [sprintf('%s/src/Entity', dirname(__DIR__))],
    true
);

$entityManager = EntityManager::create(
    ['url' => getenv('DATABASE_URL')],
    $config
);

return ConsoleRunner::createHelperSet($entityManager);
