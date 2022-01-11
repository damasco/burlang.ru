<?php
$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->exclude('web')
    ->exclude('runtime')
    ->exclude('tests')
    ->exclude('node_modules')
    ->exclude('views')
    ->in(__DIR__);

$config = new PhpCsFixer\Config();
return $config->setRules([
        '@PSR12' => true,
        'indentation_type' => true,
        'method_chaining_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setIndent('    ')
    ->setFinder($finder);
