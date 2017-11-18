<?php

namespace App\Pipelines\Site;

use App\Passables\Site\Index as PassableIndex;
use App\Pipelines\Pipeline;
use App\Pipes\Site\Index\Format;
use App\Pipes\Site\Index\Paginate;
use App\Pipes\Site\Index\Search;
use App\Pipes\Site\Index\Sort;

/**
 * Class Index
 * @package App\Pipelines\Account
 */
class Index extends Pipeline
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
        $passable = new PassableIndex();
        $passable->setRequest($request);
        $this->setPassable($passable);

        return $this;
    }

    /**
     * This is the flush function, it executes the entire pipe
     * @return PassableIndex
     */
    public function flush()
    {
        return $this->send($this->getPassable())
            ->through(
                [
                    Search::class,
                    Sort::class,
                    Paginate::class,
                    Format::class,
                ]
            )
            ->then(
                function (PassableIndex $passable) {
                    return $passable->getResponse();
                }
            );
    }
}