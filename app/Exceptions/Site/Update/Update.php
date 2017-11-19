<?php

namespace App\Exceptions\Site\Update;

use Exception;
use Throwable;

/**
 * Class Update
 * @package App\Exceptions\Site\Update
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
            'Site update failed.',
            500,
            $previous
        );
    }
}