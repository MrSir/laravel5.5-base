<?php

namespace App\Pipes\Destroy;

use App\Passables\Destroy as PassableDestroy;
use App\Pipes\Pipe;
use Throwable;

/**
 * Class Delete
 * @package App\Pipes\Destroy
 */
abstract class Delete extends Pipe
{
    /**
     * @param PassableDestroy $passable
     */
    public function deleteModel(PassableDestroy &$passable)
    {
        try {
            $model = $passable->getModel();
            $model->delete();
            $passable->setModel($model);
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }
    }
}