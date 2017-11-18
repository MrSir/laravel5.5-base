<?php

namespace App\Exceptions\Page\Index;

use Exception;
use Throwable;

/**
 * Class Format
 * @package App\Exceptions\Page\Index
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
            'Page format failed.',
            500,
            $previous
        );
    }
}