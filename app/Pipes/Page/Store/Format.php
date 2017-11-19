<?php

namespace App\Pipes\Page\Store;

use App\Exceptions\Page\Store\Format as ExceptionFormat;
use App\Pipes\Store\Format as StoreFormat;

/**
 * Class Format
 * @package App\Pipes\Page\Store
 */
class Format extends StoreFormat
{
    /**
     * Format constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionFormat::class);
    }
}