<?php

namespace App\Exceptions\Page\Store;

use Exception;
use Throwable;

/**
 * Class Create
 * @package App\Exceptions\Page\Store
 */
class Create extends Exception
{
    /**
     * Create constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(
            'Page create failed.',
            500,
            $previous
        );
    }
}