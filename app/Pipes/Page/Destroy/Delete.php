<?php

namespace App\Pipes\Page\Destroy;

use App\Exceptions\Page\Destroy\Delete as ExceptionDelete;
use App\Pipes\Destroy\Delete as DestroyDelete;
use App\Passables\Page\Destroy as PassableDestroy;
use Closure;
use Throwable;

/**
 * Class Delete
 * @package App\Pipes\Page\Destroy
 */
class Delete extends DestroyDelete
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionDelete::class);
    }

    /**
     * @param PassableDestroy $passable
     * @param Closure         $next
     *
     * @return mixed
     * @throws ExceptionDelete
     */
    public function handle(PassableDestroy &$passable, Closure $next)
    {
        try {
            $this->deleteModel($passable);
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}