<?php

namespace App\Pipes\Element\Update;

use App\Exceptions\Element\Update\UpdateAttributes as ExceptionUpdateAttributes;
use App\Models\Element;
use App\Passables\Element\Update;
use App\Pipes\Pipe;
use Closure;
use Throwable;

/**
 * Class UpdateAttributes
 * @package App\Pipes\Element\Update
 */
class UpdateAttributes extends Pipe
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionUpdateAttributes::class);
    }

    /**
     * @param Update   $passable
     * @param Closure $next
     *
     * @return mixed
     * @throws ExceptionUpdateAttributes
     */
    public function handle(Update &$passable, Closure $next)
    {
        try {
            $element = $passable->getModel();
            $request = $passable->getRequest();
            $requestAttributes = $request->get('attributes');

            // cleanup deleted attributes
            $idsToKeep = collect($requestAttributes)->pluck('id')->toArray();
            Element\Attribute::whereNotIn('id', $idsToKeep)->delete();

            // update and create new
            foreach($requestAttributes as $requestAttribute) {
                if (isset($requestAttribute['id'])) {
                    $attribute = Element\Attribute::find($requestAttribute['id']);
                    $attribute->fill($requestAttribute);
                    $attribute->save();

                    continue;
                }

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