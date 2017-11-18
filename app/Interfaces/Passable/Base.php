<?php

namespace App\Interfaces\Passable;

/**
 * Interface Base
 * @package App\Interfaces\Passable
 */
interface Base
{
    /**
     * @return mixed
     */
    public function getRequest();

    /**
     * @param $request
     */
    public function setRequest($request);

    /**
     * @return mixed
     */
    public function getResponse();

    /**
     * @param $response
     */
    public function setResponse($response);
}