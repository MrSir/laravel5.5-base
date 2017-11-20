<?php

namespace App\Pipes\Page\Destroy;

use App\Exceptions\Page\Destroy\DeleteElements as ExceptionDeleteElements;
use App\Pipes\Pipe;
use App\Passables\Page\Destroy as PassableDestroy;
use Closure;
use Throwable;

/**
 * Class DeleteElements
 * @package App\Pipes\Page\Destroy
 */
class DeleteElements extends Pipe
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionDeleteElements::class);
    }

    /**
     * @param PassableDestroy $passable
     * @param Closure         $next
     *
     * @return mixed
     * @throws ExceptionDeleteElements
     */
    public function handle(PassableDestroy &$passable, Closure $next)
    {
        try {
            $page = $passable->getModel();
            $page->elements()->delete();
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}