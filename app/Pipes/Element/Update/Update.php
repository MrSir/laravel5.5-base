<?php

namespace App\Pipes\Element\Update;

use App\Exceptions\Element\Update\Update as ExceptionUpdate;
use App\Pipes\Update\Update as UpdateUpdate;
use App\Passables\Element\Update as PassableUpdate;
use Closure;
use Throwable;

/**
 * Class Create
 * @package App\Pipes\Element\Update
 */
class Update extends UpdateUpdate
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionUpdate::class);
    }

    /**
     * @param PassableUpdate $passable
     * @param Closure        $next
     *
     * @return mixed
     * @throws ExceptionUpdate
     */
    public function handle(PassableUpdate &$passable, Closure $next)
    {
        try {
            $this->updateModel($passable);
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}