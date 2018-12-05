<?php namespace App\Http\Resources\Locale;

use App\Entities\Locale\Locale;
use App\Http\Resources\AbstractResource;
use Illuminate\Http\Request;

/**
 * Class LocaleResource
 *
 * @package App\Http\Resources\Locale
 * @author  Nick Menke <nick@nlmenke.net>
 */
class LocaleResource extends AbstractResource
{
    /**
     * Create a new resource instance.
     *
     * @param Locale $resource
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
     * @return array
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
