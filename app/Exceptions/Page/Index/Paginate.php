<?php

namespace App\Exceptions\Page\Index;

use Exception;
use Throwable;

/**
 * Class Paginate
 * @package App\Exceptions\Page\Index
 */
class Paginate extends Exception
{
    /**
     * Paginate constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Page paginate failed.',
            500,
            $previous
        );
    }
}