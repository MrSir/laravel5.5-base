<?php

namespace App\Exceptions\Element\Store;

use Exception;
use Throwable;

/**
 * Class Format
 * @package App\Exceptions\Element\Store
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
            'Element format failed.',
            500,
            $previous
        );
    }
}