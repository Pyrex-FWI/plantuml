<?php

//$finder = PhpCsFixer\Finder::create()
//    ->exclude('src')
//    ->in(__DIR__)
//;

$config = new PhpCsFixer\Config();
return $config->setRules([
        '@PSR2' => true,
        'strict_param' => true,
        'array_syntax' => ['syntax' => 'short'],
        '@PHP73Migration' => true,
        'declare_strict_types' => true,
        'ordered_imports' => true,
        'binary_operator_spaces' => [
            'operators' => [
                '=>' => 'align_single_space_minimal'
            ],
        ],
])
//    ->setFinder($finder)
;