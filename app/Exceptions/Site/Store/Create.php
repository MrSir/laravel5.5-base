<?php

namespace App\Exceptions\Site\Store;

use Exception;
use Throwable;

/**
 * Class Create
 * @package App\Exceptions\Site\Store
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
            'Site create failed.',
            500,
            $previous
        );
    }
}