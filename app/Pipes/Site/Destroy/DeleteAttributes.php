<?php

namespace App\Pipes\Site\Destroy;

use App\Exceptions\Site\Destroy\DeleteAttributes as ExceptionDeleteAttributes;
use App\Pipes\Pipe;
use App\Passables\Site\Destroy as PassableDestroy;
use Closure;
use Throwable;

/**
 * Class DeleteAttributes
 * @package App\Pipes\Site\Destroy
 */
class DeleteAttributes extends Pipe
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionDeleteAttributes::class);
    }

    /**
     * @param PassableDestroy $passable
     * @param Closure         $next
     *
     * @return mixed
     * @throws ExceptionDeleteAttributes
     */
    public function handle(PassableDestroy &$passable, Closure $next)
    {
        try {
            $site = $passable->getModel();

            foreach($site->pages as $page) {
                foreach($page->elements as $element) {
                    $element->elementAttributes()->delete();
                }
            }
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}