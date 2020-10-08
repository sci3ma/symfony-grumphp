<?php

// @codeCoverageIgnoreStart
$finder = PhpCsFixer\Finder::create()
    ->exclude(['var', 'public', 'vendor'])
    ->in(__DIR__);

return PhpCsFixer\Config::create()
    ->setFinder($finder);
// @codeCoverageIgnoreEnd
