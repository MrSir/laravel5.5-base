<?php

namespace App\Pipes\Site\Destroy;

use App\Exceptions\Site\Destroy\DeleteElements as ExceptionDeleteElements;
use App\Pipes\Pipe;
use App\Passables\Site\Destroy as PassableDestroy;
use Closure;
use Throwable;

/**
 * Class DeleteElements
 * @package App\Pipes\Site\Destroy
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
            $site = $passable->getModel();

            foreach($site->pages as $page) {
                $page->elements()->delete();
            }
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}