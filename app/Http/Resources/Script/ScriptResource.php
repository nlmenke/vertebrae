<?php namespace App\Http\Resources\Script;

use App\Entities\Script\Script;
use App\Http\Resources\AbstractResource;
use Illuminate\Http\Request;

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
