<?php

namespace App\Exceptions\Element\Store;

use Exception;
use Throwable;

/**
 * Class CreateAttributes
 * @package App\Exceptions\Element\Store
 */
class CreateAttributes extends Exception
{
    /**
     * Create constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Element create attributes failed.',
            500,
            $previous
        );
    }
}