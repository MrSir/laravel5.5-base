<?php

namespace App\Pipes\Page\Store;

use App\Exceptions\Page\Store\Create as ExceptionCreate;
use App\Models\Page;
use App\Passables\Page\Store;
use App\Pipes\Store\Create as StoreCreate;
use Closure;
use Throwable;

/**
 * Class Create
 * @package App\Pipes\Page\Store
 */
class Create extends StoreCreate
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionCreate::class);
        $this->setModel(Page::class);
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