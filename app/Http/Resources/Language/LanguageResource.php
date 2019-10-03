<?php declare(strict_types=1);

namespace App\Http\Resources\Language;

use App\Entities\Language\Language;
use App\Http\Resources\AbstractResource;
use Illuminate\Http\Request;

/**
 * Class LanguageResource
 *
 * @package App\Http\Resources\Language
 * @author  Nick Menke <nick@nlmenke.net>
 */
class LanguageResource extends AbstractResource
{
    /**
     * Create a new resource instance.
     *
     * @param Language $resource
     * @return void
     */
    public function __construct(Language $resource)
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
