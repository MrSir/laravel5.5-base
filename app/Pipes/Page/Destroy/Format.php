<?php

namespace App\Pipes\Page\Destroy;

use App\Exceptions\Page\Destroy\Format as ExceptionFormat;
use App\Pipes\Destroy\Format as DestroyFormat;

/**
 * Class Format
 * @package App\Pipes\Page\Destroy
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