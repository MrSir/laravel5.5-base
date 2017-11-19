<?php

namespace App\Exceptions\Page\Update;

use Exception;
use Throwable;

/**
 * Class Update
 * @package App\Exceptions\Page\Update
 */
class Update extends Exception
{
    /**
     * Update constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Page update failed.',
            500,
            $previous
        );
    }
}