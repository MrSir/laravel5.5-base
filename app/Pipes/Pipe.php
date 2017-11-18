<?php

namespace App\Pipes;

use Exception;

/**
 * Class Pipe
 * @package App\Pipes
 */
abstract class Pipe
{
    /**
     * @var string
     */
    protected $exceptionType = Exception::class;

    /**
     * Pipe constructor.
     *
     * @param $exceptionType
     */
    public function __construct($exceptionType)
    {
        $this->setExceptionType($exceptionType);
    }

    /**
     * @return string
     */
    public function getExceptionType()
    {
        return $this->exceptionType;
    }

    /**
     * @param string $exceptionType
     */
    public function setExceptionType($exceptionType)
    {
        $this->exceptionType = $exceptionType;
    }
}