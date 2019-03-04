<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude(['var', 'public'])
    ->in(__DIR__);

return PhpCsFixer\Config::create()
    ->setFinder($finder);
