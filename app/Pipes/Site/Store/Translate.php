<?php

namespace App\Pipes\Site\Store;

use App\Exceptions\Site\Store\Translate as ExceptionTranslate;
use App\Models\Site;
use App\Passables\Site\Store;
use App\Pipes\Store\Translate as StoreTranslate;
use Closure;
use Throwable;

/**
 * Class Translate
 * @package App\Pipes\Site\Store
 */
class Translate extends StoreTranslate
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionTranslate::class);
        $this->setModel(Site::class);
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