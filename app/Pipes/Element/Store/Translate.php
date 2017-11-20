<?php

namespace App\Pipes\Element\Store;

use App\Exceptions\Element\Store\Translate as ExceptionTranslate;
use App\Models\Element;
use App\Passables\Element\Store;
use App\Pipes\Store\Translate as StoreTranslate;
use Closure;
use Throwable;

/**
 * Class Translate
 * @package App\Pipes\Element\Store
 */
class Translate extends StoreTranslate
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
     * @param Store   $passable
     * @param Closure $next
     *
     * @return mixed
     * @throws ExceptionTranslate
     */
    public function handle(Store &$passable, Closure $next)
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