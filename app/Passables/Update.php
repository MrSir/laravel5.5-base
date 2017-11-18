<?php

namespace App\Passables;

use App\Interfaces\Passable\Update as PassableUpdate;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Update
 * @package App\Passables
 */
class Update extends Base implements PassableUpdate
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