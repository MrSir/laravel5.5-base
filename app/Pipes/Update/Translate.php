<?php

namespace App\Pipes\Update;

use App\Passables\Update;
use App\Pipes\Pipe;
use Throwable;

/**
 * Class Translate
 * @package App\Pipes\Update
 */
abstract class Translate extends Pipe
{
    /**
     * @var string
     */
    protected $model;

    /**
     * @param Update $passable
     */
    public function translateRequest(Update &$passable)
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