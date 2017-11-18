<?php

namespace App\Passables;

use App\Interfaces\Passable\Store as PassableStore;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Store
 * @package App\Passables
 */
class Store extends Base implements PassableStore
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param Model $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }
}