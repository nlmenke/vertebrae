<?php

/**
 * Locale Resource.
 *
 * @package App\Http\Resources\Locale
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace App\Http\Resources\Locale;

use App\Entities\Locale\Locale;
use App\Http\Resources\AbstractResource;
use Illuminate\Http\Request;

/**
 * The Locale resource class.
 *
 * This class transforms locale models into JSON responses for your API.
 *
 * @since x.x.x introduced
 */
class LocaleResource extends AbstractResource
{
    /**
     * Create a new resource instance.
     *
     * @param Locale $resource
     *
     * @return void
     */
    public function __construct(Locale $resource)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
