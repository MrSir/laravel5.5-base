<?php

namespace App\Exceptions\Site\Index;

use Exception;
use Throwable;

/**
 * Class Paginate
 * @package App\Exceptions\Site\Index
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
            'Site paginate failed.',
            500,
            $previous
        );
    }
}