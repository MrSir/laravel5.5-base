<?php

namespace App\Pipes\Page\Destroy;

use App\Exceptions\Page\Destroy\DeleteAttributes as ExceptionDeleteAttributes;
use App\Pipes\Pipe;
use App\Passables\Page\Destroy as PassableDestroy;
use Closure;
use Throwable;

/**
 * Class DeleteAttributes
 * @package App\Pipes\Page\Destroy
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
            $page = $passable->getModel();

            foreach ($page->elements as $element) {
                $element->attributes()
                    ->delete();
            }
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}