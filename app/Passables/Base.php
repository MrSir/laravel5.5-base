<?php

namespace App\Passables;

use App\Interfaces\Passable\Base as PassableBase;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Base
 * @package App\Passables
 */
class Base implements PassableBase
{
    /**
     * @var FormRequest
     */
    protected $request;
    /**
     * @var array
     */
    protected $response;

    /**
     * @return FormRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param FormRequest $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param array $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }
}