<?php

namespace App\Exceptions\User\Store;

use Exception;
use Throwable;

/**
 * Class Create
 * @package App\Exceptions\User\Store
 */
class Create extends Exception
{
    /**
     * Create constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'User create failed.',
            500,
            $previous
        );
    }
}