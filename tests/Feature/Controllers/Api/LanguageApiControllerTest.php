<?php namespace Tests\Feature\Controllers\Api;

use App\Entities\Language\Language;

/**
 * Class LanguageApiControllerTest
 *
 * @package Tests\Feature\Controllers\Api
 * @author  Nick Menke <nick@nlmenke.net>
 */
class LanguageApiControllerTest extends AbstractApiControllerTest
{
    /**
     * The entity used by the tests.
     *
     * @var Language
     */
    protected $model = Language::class;

    /**
     * Required fields to be cleared for testing validation.
     *
     * @var array
     */
    protected $validationRequirements = [
        'iso_alpha_2',
        'iso_alpha_3',
        'name',
        'native',
    ];
}
