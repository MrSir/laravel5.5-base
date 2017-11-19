<?php

namespace App\Exceptions\Site\Destroy;

use Exception;
use Throwable;

/**
 * Class Delete
 * @package App\Exceptions\Site\Destroy
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
            'Site delete failed.',
            500,
            $previous
        );
    }
}