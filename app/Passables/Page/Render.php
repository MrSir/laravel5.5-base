<?php

namespace App\Passables\Page;

use App\Passables\Base;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Render
 * @package App\Passables\Page
 */
class Render extends Base
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