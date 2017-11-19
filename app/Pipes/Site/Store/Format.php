<?php

namespace App\Pipes\Site\Store;

use App\Exceptions\Site\Store\Format as ExceptionFormat;
use App\Pipes\Store\Format as StoreFormat;

/**
 * Class Format
 * @package App\Pipes\Site\Store
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