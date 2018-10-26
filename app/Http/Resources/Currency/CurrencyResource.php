<?php namespace App\Http\Resources\Currency;

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
