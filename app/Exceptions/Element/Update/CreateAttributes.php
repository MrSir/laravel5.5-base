<?php

namespace App\Exceptions\Element\Update;

use Exception;
use Throwable;

/**
 * Class UpdateAttributes
 * @package App\Exceptions\Element\Update
 */
class UpdateAttributes extends Exception
{
    /**
     * Create constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Element update attributes failed.',
            500,
            $previous
        );
    }
}