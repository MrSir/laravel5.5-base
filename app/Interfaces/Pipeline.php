<?php

namespace App\Interfaces;

/**
 * Interface Pipeline
 * @package App\Interfaces
 */
interface Pipeline
{
    /**
     * @param $request
     *
     * @return mixed
     */
    public function fill($request);

    /**
     * @return mixed
     */
    public function flush();
}