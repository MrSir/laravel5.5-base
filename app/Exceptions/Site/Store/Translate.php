<?php

namespace App\Exceptions\Site\Store;

use Exception;
use Throwable;

/**
 * Class Translate
 * @package App\Exceptions\Site\Store
 */
class Translate extends Exception
{
    /**
     * Create constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Site translate failed.',
            500,
            $previous
        );
    }
}