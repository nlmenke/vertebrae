<?php declare(strict_types=1);

namespace Tests\Feature\Controllers\Api;

use App\Entities\Locale\Locale;

/**
 * Class LocaleApiControllerTest
 *
 * @package Tests\Feature\Controllers\Api
 * @author  Nick Menke <nick@nlmenke.net>
 */
class LocaleApiControllerTest extends AbstractApiControllerTest
{
    /**
     * The entity used by the tests.
     *
     * @var Locale
     */
    protected $model = Locale::class;

    /**
     * Required fields to be cleared for testing validation.
     *
     * @var array
     */
    protected $validationRequirements = [
        'language_id',
        'script_id',
        'code',
        'native',
    ];
}
