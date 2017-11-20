<?php

namespace App\Pipelines\Page;

use App\Passables\Page\Update as PassableUpdate;
use App\Pipelines\Pipeline;
use App\Pipes\Page\Update\Translate;
use App\Pipes\Page\Update\Update as PipeUpdate;
use App\Pipes\Page\Update\Format;

/**
 * Class Update
 * @package App\Pipelines\Page
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