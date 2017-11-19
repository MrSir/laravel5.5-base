<?php

namespace App\Pipes\Site\Update;

use App\Exceptions\Site\Update\Format as ExceptionFormat;
use App\Pipes\Update\Format as UpdateFormat;

/**
 * Class Format
 * @package App\Pipes\Site\Update
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