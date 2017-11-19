<?php

namespace App\Exceptions\Site\Store;

use Exception;
use Throwable;

/**
 * Class Format
 * @package App\Exceptions\Site\Store
 */
class Format extends Exception
{
    /**
     * Format constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Site format failed.',
            500,
            $previous
        );
    }
}