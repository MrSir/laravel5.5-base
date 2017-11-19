<?php

namespace App\Pipes\Element\Destroy;

use App\Exceptions\Element\Destroy\Format as ExceptionFormat;
use App\Pipes\Destroy\Format as DestroyFormat;

/**
 * Class Format
 * @package App\Pipes\Element\Destroy
 */
class Format extends DestroyFormat
{
    /**
     * Format constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionFormat::class);
    }
}