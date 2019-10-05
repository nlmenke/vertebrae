<?php declare(strict_types=1);
/**
 * Script Resource.
 *
 * @package   App\Http\Resources\Script
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 * @link      https://github.com/nlmenke/vertebrae
 */

namespace App\Http\Resources\Script;

use App\Entities\Script\Script;
use App\Http\Resources\AbstractResource;
use Illuminate\Http\Request;

/**
 * The Script resource class.
 *
 * This class transforms script models into JSON responses for your API.
 *
 * @since x.x.x introduced
 */
class ScriptResource extends AbstractResource
{
    /**
     * Create a new resource instance.
     *
     * @param Script $resource
     * @return void
     */
    public function __construct(Script $resource)
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
