<?php

namespace App\Pipes\Site\Destroy;

use App\Exceptions\Site\Destroy\DeletePages as ExceptionDeletePages;
use App\Pipes\Pipe;
use App\Passables\Site\Destroy as PassableDestroy;
use Closure;
use Throwable;

/**
 * Class DeletePages
 * @package App\Pipes\Site\Destroy
 */
class DeletePages extends Pipe
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionDeletePages::class);
    }

    /**
     * @param PassableDestroy $passable
     * @param Closure         $next
     *
     * @return mixed
     * @throws ExceptionDeletePages
     */
    public function handle(PassableDestroy &$passable, Closure $next)
    {
        try {
            $site = $passable->getModel();
            $site->pages()->delete();
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}