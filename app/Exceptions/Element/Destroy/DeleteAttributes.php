<?php

namespace App\Exceptions\Element\Destroy;

use Exception;
use Throwable;

/**
 * Class DeleteAttributes
 * @package App\Exceptions\Element\Destroy
 */
class DeleteAttributes extends Exception
{
    /**
     * Create constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Element delete attributes failed.',
            500,
            $previous
        );
    }
}