<?php

namespace App\Exceptions\Site\Index;

use Exception;
use Throwable;

/**
 * Class Sort
 * @package App\Exceptions\Site\Index
 */
class Sort extends Exception
{
    /**
     * Sort constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Site sort failed.',
            500,
            $previous
        );
    }
}