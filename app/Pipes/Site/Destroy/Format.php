<?php

namespace App\Pipes\Site\Destroy;

use App\Exceptions\Site\Destroy\Format as ExceptionFormat;
use App\Pipes\Destroy\Format as DestroyFormat;

/**
 * Class Format
 * @package App\Pipes\Site\Destroy
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