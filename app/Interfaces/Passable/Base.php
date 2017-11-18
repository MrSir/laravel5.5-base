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
     *
     * @return mixed
     */
    public function setRequest($request);

    /**
     * @return mixed
     */
    public function getResponse();

    /**
     * @param $response
     *
     * @return mixed
     */
    public function setResponse($response);
}