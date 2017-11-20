<?php

namespace App\Exceptions\Site\Destroy;

use Exception;
use Throwable;

/**
 * Class DeleteAttributes
 * @package App\Exceptions\Site\Destroy
 */
class DeleteAttributes extends Exception
{
    /**
     * Update constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Element Attributes delete failed.',
            500,
            $previous
        );
    }
}