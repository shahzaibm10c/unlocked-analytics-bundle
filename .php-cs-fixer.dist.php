<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/src');

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PHP84Migration' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,

        'array_syntax' => ['syntax' => 'short'],
        'nullable_type_declaration_for_default_null_value' => true,
        'phpdoc_to_comment' => false,
    ])
    ->setFinder($finder);
