<?php

namespace App\Exceptions\Element\Destroy;

use Exception;
use Throwable;

/**
 * Class Format
 * @package App\Exceptions\Element\Destroy
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