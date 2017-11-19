<?php

namespace App\Pipes\Element\Store;

use App\Exceptions\Element\Store\Format as ExceptionFormat;
use App\Pipes\Store\Format as StoreFormat;

/**
 * Class Format
 * @package App\Pipes\Element\Store
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