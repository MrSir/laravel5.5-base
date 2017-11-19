<?php

namespace App\Pipes\Site\Store;

use App\Exceptions\Site\Store\Create as ExceptionCreate;
use App\Models\Site;
use App\Passables\Site\Store;
use App\Pipes\Store\Create as StoreCreate;
use Closure;
use Throwable;

/**
 * Class Create
 * @package App\Pipes\Site\Store
 */
class Create extends StoreCreate
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionCreate::class);
        $this->setModel(Site::class);
    }

    /**
     * @param Store   $passable
     * @param Closure $next
     *
     * @return mixed
     * @throws ExceptionCreate
     */
    public function handle(Store &$passable, Closure $next)
    {
        try {
            $this->storeModel($passable);
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}