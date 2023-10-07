<?php
/**
 * Config file for PHP CS Fixer.
 *
 * @package Config - PHP CS Fixer
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2023 Nick Menke
 *
 * @link  https://github.com/nlmenke/vertebrae
 * @since x.x.x introduced
 */

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

/**
 * Rules to be implemented by PHP CS Fixer.
 *
 * @see https://mlocati.github.io/php-cs-fixer-configurator/#version:3.34
 */
$rules = [
    //
];

$finder = Finder::create()
    ->in(__DIR__)
    ->exclude([
        'bootstrap/cache',
        'config',
        'storage',
    ])
    ->ignoreVCSIgnored(true);

return (new Config())
    ->setRiskyAllowed(true)
    ->setRules(array_merge([
        '@PSR12' => true,
    ], $rules))
    ->setfinder($finder);
