<?php

namespace App\Exceptions\Page\Index;

use Exception;
use Throwable;

/**
 * Class Search
 * @package App\Exceptions\Page\Index
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
            'Page search failed.',
            500,
            $previous
        );
    }
}