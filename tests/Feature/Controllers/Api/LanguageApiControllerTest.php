<?php
/**
 * Language API Controller Test Case.
 *
 * @package Tests\Feature\Controllers\Api
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace Tests\Feature\Controllers\Api;

use App\Entities\Language\Language;
use App\Http\Controllers\Api\LanguageApiController;

/**
 * The Language API controller test class.
 *
 * This class is used to test language API route functionality.
 *
 * Functional tests are written from a user's perspective. These tests confirm
 * that the system does what users are expecting it to.
 *
 * @covers LanguageApiController
 *
 * @internal
 * @small
 *
 * @since x.x.x introduced
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
    ];
}
