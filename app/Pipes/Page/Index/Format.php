<?php

namespace App\Pipes\Page\Index;

use App\Exceptions\Page\Index\Format as ExceptionFormat;
use App\Pipes\Index\Format as IndexFormat;

/**
 * Class Format
 * @package App\Pipes\Account\Index
 */
class Format extends IndexFormat
{
    /**
     * Format constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionFormat::class);
    }
}