<?php

namespace App\Exceptions\Page\Render;

use Exception;
use Throwable;

/**
 * Class FindPage
 * @package App\Exceptions\Page\Render
 */
class FindPage extends Exception
{
    /**
     * Create constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Page find failed.',
            500,
            $previous
        );
    }
}