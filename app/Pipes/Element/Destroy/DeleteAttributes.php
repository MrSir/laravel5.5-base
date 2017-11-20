<?php

namespace App\Pipes\Element\Destroy;

use App\Exceptions\Element\Destroy\DeleteAttributes as ExceptionDeleteAttributes;
use App\Passables\Element\Destroy;
use App\Pipes\Pipe;
use Closure;
use Throwable;

/**
 * Class DeleteAttributes
 * @package App\Pipes\Element\Destroy
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
     * @param Destroy $passable
     * @param Closure $next
     *
     * @return mixed
     * @throws ExceptionDeleteAttributes
     */
    public function handle(Destroy &$passable, Closure $next)
    {
        try {
            $element = $passable->getModel();
            $element->elementAttributes()
                ->delete();
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}