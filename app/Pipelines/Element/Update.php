<?php

namespace App\Pipelines\Element;

use App\Passables\Element\Update as PassableUpdate;
use App\Pipelines\Pipeline;
use App\Pipes\Element\Update\Update as PipeUpdate;
use App\Pipes\Element\Update\Format;

/**
 * Class Update
 * @package App\Pipelines\Element
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
                    //TODO add translate
                    PipeUpdate::class,
                    //TODO add update attributes
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