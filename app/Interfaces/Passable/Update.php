<?php

namespace App\Interfaces\Passable;

/**
 * Interface Update
 * @package App\Interfaces\Passable
 */
interface Update extends Base
{
    /**
     * @param $model
     */
    public function setModel($model);

    /**
     * @return mixed
     */
    public function getModel();
}