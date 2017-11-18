<?php

namespace App\Exceptions\Page\Index;

use Exception;
use Throwable;

/**
 * Class Sort
 * @package App\Exceptions\Page\Index
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
            'Page sort failed.',
            500,
            $previous
        );
    }
}