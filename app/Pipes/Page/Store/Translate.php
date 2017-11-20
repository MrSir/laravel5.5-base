<?php

namespace App\Pipes\Page\Store;

use App\Exceptions\Page\Store\Translate as ExceptionTranslate;
use App\Models\Page;
use App\Passables\Page\Store;
use App\Pipes\Store\Translate as StoreTranslate;
use Closure;
use Throwable;

/**
 * Class Translate
 * @package App\Pipes\Page\Store
 */
class Translate extends StoreTranslate
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionTranslate::class);
        $this->setModel(Page::class);
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