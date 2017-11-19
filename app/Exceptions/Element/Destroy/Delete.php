<?php

namespace App\Exceptions\Element\Destroy;

use Exception;
use Throwable;

/**
 * Class Delete
 * @package App\Exceptions\Element\Destroy
 */
class Delete extends Exception
{
    /**
     * Update constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Element delete failed.',
            500,
            $previous
        );
    }
}