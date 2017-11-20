<?php

namespace App\Pipes\Store;

use App\Passables\Store;
use App\Pipes\Pipe;
use Throwable;

/**
 * Class Translate
 * @package App\Pipes\Store
 */
abstract class Translate extends Pipe
{
    /**
     * @var string
     */
    protected $model;

    /**
     * @param Store $passable
     */
    public function translateRequest(Store &$passable)
    {
        try {
            $request = $passable->getRequest();

            foreach($request->all() as $field=>$value){
                $request[snake_case($field)] = $value;
            }

            $passable->setRequest($request);
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }
}