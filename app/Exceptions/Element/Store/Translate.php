<?php

namespace App\Exceptions\Element\Store;

use Exception;
use Throwable;

/**
 * Class Translate
 * @package App\Exceptions\Element\Store
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
            'Element translate failed.',
            500,
            $previous
        );
    }
}