<?php

namespace App\Exceptions\Page\Render;

use Exception;
use Throwable;

/**
 * Class RenderPage
 * @package App\Exceptions\Page\Render
 */
class RenderPage extends Exception
{
    /**
     * Create constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Page render failed.',
            500,
            $previous
        );
    }
}