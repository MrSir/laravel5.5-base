<?php

namespace App\Exceptions\Element\Update;

use Exception;
use Throwable;

/**
 * Class Update
 * @package App\Exceptions\Element\Update
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
            'Element update failed.',
            500,
            $previous
        );
    }
}