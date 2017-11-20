<?php

namespace App\Pipes\Element\Store;

use App\Exceptions\Element\Store\Create as ExceptionCreate;
use App\Models\Element;
use App\Passables\Element\Store;
use App\Pipes\Pipe;
use Closure;
use Throwable;

/**
 * Class Create
 * @package App\Pipes\Element\Store
 */
class CreateAttributes extends Pipe
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionCreate::class);
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
            $element = $passable->getModel();
            $request = $passable->getRequest();
            $requestAttributes = $request->get('attributes');

            foreach($requestAttributes as $requestAttribute) {
                $attribute = Element\Attribute::make($requestAttribute);

                $element->elementAttributes()
                    ->save($attribute);
            }

            $passable->setModel($element);
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}