<?php

namespace App\Exceptions\Page\Destroy;

use Exception;
use Throwable;

/**
 * Class Delete
 * @package App\Exceptions\Page\Destroy
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
            'Page delete failed.',
            500,
            $previous
        );
    }
}