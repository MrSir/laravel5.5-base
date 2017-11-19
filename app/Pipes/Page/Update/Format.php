<?php

namespace App\Pipes\Page\Update;

use App\Exceptions\Page\Update\Format as ExceptionFormat;
use App\Pipes\Update\Format as UpdateFormat;

/**
 * Class Format
 * @package App\Pipes\Page\Update
 */
class Format extends UpdateFormat
{
    /**
     * Format constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionFormat::class);
    }
}