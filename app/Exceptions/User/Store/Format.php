<?php

namespace App\Exceptions\User\Store;

use Exception;
use Throwable;

/**
 * Class Format
 * @package App\Exceptions\User\Store
 */
class Format extends Exception
{
    /**
     * Format constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'User format failed.',
            500,
            $previous
        );
    }
}