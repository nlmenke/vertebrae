<?php namespace App\Services\Entities;

use App\Entities\AbstractEntity;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class AbstractEntityService
{
    /**
     * The model class.
     *
     * @var AbstractEntity
     */
    protected $model;

    /**
     * Paginate the model response.
     *
     * @param int $count
     * @return LengthAwarePaginator
     */
    public function paginate(int $count = 15): LengthAwarePaginator
    {
        return $this->model->paginate($count);
    }
}
