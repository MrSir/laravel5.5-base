<?php

namespace App\Pipes\Element\Update;

use App\Exceptions\Element\Update\Format as ExceptionFormat;
use App\Pipes\Update\Format as UpdateFormat;

/**
 * Class Format
 * @package App\Pipes\Element\Update
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