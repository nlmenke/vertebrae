<?php declare(strict_types=1);

namespace App\Http\Resources\Currency;

use App\Entities\Currency\Currency;
use App\Http\Resources\AbstractResource;
use Illuminate\Http\Request;

/**
 * Class CurrencyResource
 *
 * @package App\Http\Resources\Currency
 * @author  Nick Menke <nick@nlmenke.net>
 */
class CurrencyResource extends AbstractResource
{
    /**
     * Create a new resource instance.
     *
     * @param Currency $resource
     * @return void
     */
    public function __construct(Currency $resource)
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
