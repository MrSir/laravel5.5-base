<?php

namespace App\Interfaces\Passable;

/**
 * Interface Destroy
 * @package App\Interfaces\Passable
 */
interface Destroy extends Base
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