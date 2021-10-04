<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->exclude('node_module')
    ->in(__DIR__)
    ->name('*.php')
    ->notName('.php_cs')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
;

$config = new PhpCsFixer\Config();

return $config->setRules([
        '@PhpCsFixer' => true,
        'array_syntax' => ['syntax' => 'short'],
        'types_spaces' => ['space' => 'single'],
        'concat_space' => ['spacing' => 'one'],
    ])
    ->setFinder($finder)
    ->setUsingCache(false)
    ->setRiskyAllowed(true);
