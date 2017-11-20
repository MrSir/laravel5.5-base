<?php

namespace App\Exceptions\Page\Destroy;

use Exception;
use Throwable;

/**
 * Class DeleteAttributes
 * @package App\Exceptions\Page\Destroy
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