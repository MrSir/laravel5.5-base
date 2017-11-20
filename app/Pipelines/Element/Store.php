<?php

namespace App\Pipelines\Element;

use App\Passables\Element\Store as PassableStore;
use App\Pipelines\Pipeline;
use App\Pipes\Element\Store\Create;
use App\Pipes\Element\Store\CreateAttributes;
use App\Pipes\Element\Store\Format;
use App\Pipes\Element\Store\Translate;

/**
 * Class Index
 * @package App\Pipelines\Category
 */
class Store extends Pipeline
{
    /**
     * This is the fill function, it initializes the pipeline
     *
     * @param $request
     *
     * @return $this
     */
    public function fill($request)
    {
        $passable = new PassableStore();
        $passable->setRequest($request);
        $this->setPassable($passable);

        return $this;
    }

    /**
     * This is the flush function, it executes the entire pipe
     * @return PassableStore
     */
    public function flush()
    {
        return $this->send($this->getPassable())
            ->through(
                [
                    Translate::class,
                    Create::class,
                    CreateAttributes::class,
                    Format::class,
                ]
            )
            ->then(
                function (PassableStore $passable) {
                    return $passable->getResponse();
                }
            );
    }
}