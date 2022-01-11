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
        'array_syntax' => ['syntax' => 'short'],
        'method_argument_space' => true,
        'no_whitespace_before_comma_in_array' => true,
        'trailing_comma_in_multiline' => true,
    ])
    ->setFinder($finder);
