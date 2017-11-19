<?php

namespace App\Pipes\Element\Store;

use App\Exceptions\Element\Store\Create as ExceptionCreate;
use App\Models\Element;
use App\Passables\Element\Store;
use App\Pipes\Store\Create as StoreCreate;
use Closure;
use Throwable;

/**
 * Class Create
 * @package App\Pipes\Element\Store
 */
class Create extends StoreCreate
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionCreate::class);
        $this->setModel(Element::class);
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