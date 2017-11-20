<?php

namespace App\Exceptions\Page\Destroy;

use Exception;
use Throwable;

/**
 * Class DeleteElements
 * @package App\Exceptions\Page\Destroy
 */
class DeleteElements extends Exception
{
    /**
     * Update constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Elements delete failed.',
            500,
            $previous
        );
    }
}