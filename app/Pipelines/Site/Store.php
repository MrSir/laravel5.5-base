<?php

namespace App\Pipelines\Site;

use App\Passables\Site\Store as PassableStore;
use App\Pipelines\Pipeline;
use App\Pipes\Site\Store\Create;
use App\Pipes\Site\Store\Format;
use App\Pipes\Site\Store\Translate;

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
        // add authenticated user id to the request params
        $user = $request->user();
        $request['userId'] = $user->id;

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