<?php

namespace App\Exceptions\Site\Index;

use Exception;
use Throwable;

/**
 * Class Search
 * @package App\Exceptions\Site\Index
 */
class Search extends Exception
{
    /**
     * Search constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Site search failed.',
            500,
            $previous
        );
    }
}