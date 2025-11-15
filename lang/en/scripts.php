<?php
/**
 * Script Language Lines - EN.
 *
 * @author Nick Menke <git@nlmenke.net>
 *
 * @since 0.0.0-vertebrae introduced
 */

declare(strict_types=1);

use App\Enums\ScriptDirection;

return [

    'scripts' => 'Script|Scripts',

    'directions' => [
        ScriptDirection::LTR->value => 'Left-to-Right',
        ScriptDirection::RTL->value => 'Right-to-Left',
        ScriptDirection::TTB->value => 'Top-to-Bottom',
        ScriptDirection::VARIES->value => 'Varies',
    ],

    'fields' => [
        'iso_alpha' => 'ISO Alpha',
        'iso_numeric' => 'ISO Numeric',
        'name' => 'Name',
        'direction' => 'Direction',
    ],

];
