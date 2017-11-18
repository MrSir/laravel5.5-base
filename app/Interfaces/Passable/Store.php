<?php

namespace App\Interfaces\Passable;

/**
 * Interface Store
 * @package App\Interfaces\Passable
 */
interface Store extends Base
{
    /**
     * @param $model
     *
     * @return mixed
     */
    public function setModel($model);

    /**
     * @return mixed
     */
    public function getModel();
}