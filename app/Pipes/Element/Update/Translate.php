<?php

namespace App\Pipes\Element\Update;

use App\Exceptions\Element\Update\Translate as ExceptionTranslate;
use App\Models\Element;
use App\Passables\Element\Update;
use App\Pipes\Update\Translate as UpdateTranslate;
use Closure;
use Throwable;

/**
 * Class Translate
 * @package App\Pipes\Element\Update
 */
class Translate extends UpdateTranslate
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionTranslate::class);
        $this->setModel(Element::class);
    }

    /**
     * @param Update   $passable
     * @param Closure $next
     *
     * @return mixed
     * @throws ExceptionTranslate
     */
    public function handle(Update &$passable, Closure $next)
    {
        try {
            $this->translateRequest($passable);
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}