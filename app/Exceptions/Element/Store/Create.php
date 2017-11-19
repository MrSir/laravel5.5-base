<?php

namespace App\Exceptions\Element\Store;

use Exception;
use Throwable;

/**
 * Class Create
 * @package App\Exceptions\Element\Store
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
            'Element create failed.',
            500,
            $previous
        );
    }
}