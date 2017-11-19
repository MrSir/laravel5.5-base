<?php

namespace App\Pipes\Store;

use App\Interfaces\Passable\Store;
use App\Pipes\Pipe;
use Closure;
use Exception;
use Throwable;

/**
 * Class Format
 * @package App\Pipes\Store
 */
abstract class Format extends Pipe
{
    /**
     * @param Store   $passable
     * @param Closure $next
     *
     * @return mixed
     * @throws Exception
     */
    public function handle(Store &$passable, Closure $next)
    {
        try {
            $model = $passable->getModel();
            $response = [
                'code' => 200,
                'id' => (int)$model->id,
                'results' => $model,
            ];
            $passable->setResponse($response);
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}