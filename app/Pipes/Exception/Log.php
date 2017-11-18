<?php

namespace App\Pipes\Exception;

use Log as LaravelLog;
use Closure;
use Exception;

/**
 * Class Log
 * @package App\Pipes
 */
class Log
{
    /**
     * @param Exception $e
     * @param Closure   $next
     *
     * @return mixed
     */
    public function handle(Exception $e, Closure $next)
    {
        LaravelLog::critical(
            $e->getMessage(),
            $e->getTrace()
        );

        return $next($e);
    }
}