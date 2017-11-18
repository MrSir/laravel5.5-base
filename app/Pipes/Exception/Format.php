<?php

namespace App\Pipes\Exception;

use Closure;
use Exception;

/**
 * Class Format
 * @package App\Pipes
 */
class Format
{
    /**
     * @param Exception $e
     * @param Closure   $next
     *
     * @return mixed
     */
    public function handle(Exception $e, Closure $next)
    {
        return $next(
            [
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ]
        );
    }
}