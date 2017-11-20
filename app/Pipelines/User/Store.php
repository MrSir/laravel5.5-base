<?php

namespace App\Pipelines\User;

use App\Passables\User\Store as PassableStore;
use App\Pipelines\Pipeline;
use App\Pipes\User\Store\Create;
use App\Pipes\User\Store\Format;

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
        //TODO add authenticated user id to the request params

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
                    //TODO add translate
                    Create::class,
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