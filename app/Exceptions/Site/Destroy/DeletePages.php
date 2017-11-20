<?php

namespace App\Exceptions\Site\Destroy;

use Exception;
use Throwable;

/**
 * Class DeletePages
 * @package App\Exceptions\Site\Destroy
 */
class DeletePages extends Exception
{
    /**
     * Update constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Pages delete failed.',
            500,
            $previous
        );
    }
}