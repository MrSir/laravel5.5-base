<?php

namespace App\Exceptions\Page\Store;

use Exception;
use Throwable;

/**
 * Class Translate
 * @package App\Exceptions\Page\Store
 */
class Translate extends Exception
{
    /**
     * Create constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Page translate failed.',
            500,
            $previous
        );
    }
}