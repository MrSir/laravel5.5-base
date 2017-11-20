<?php

namespace App\Pipelines\Site;

use App\Passables\Site\Update as PassableUpdate;
use App\Pipelines\Pipeline;
use App\Pipes\Site\Update\Translate;
use App\Pipes\Site\Update\Update as PipeUpdate;
use App\Pipes\Site\Update\Format;

/**
 * Class Update
 * @package App\Pipelines\Site
 */
class Update extends Pipeline
{
    /**
     * This is the fill function, it initializes the pipeline
     *
     * @param $request
     * @param $account
     *
     * @return $this
     */
    public function fill($request, $account)
    {
        $passable = new PassableUpdate();
        $passable->setRequest($request);
        $passable->setModel($account);
        $this->setPassable($passable);

        return $this;
    }

    /**
     * This is the flush function, it executes the entire pipe
     * @return array
     */
    public function flush()
    {
        return $this->send($this->getPassable())
            ->through(
                [
                    Translate::class,
                    PipeUpdate::class,
                    Format::class,
                ]
            )
            ->then(
                function (PassableUpdate $passable) {
                    return $passable->getResponse();
                }
            );
    }
}