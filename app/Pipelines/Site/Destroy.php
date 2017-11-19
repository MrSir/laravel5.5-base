<?php

namespace App\Pipelines\Site;

use App\Passables\Site\Destroy as PassableDestroy;
use App\Pipelines\Pipeline;
use App\Pipes\Site\Destroy\Delete;
use App\Pipes\Site\Destroy\Format;

/**
 * Class Destroy
 * @package App\Pipelines\Site
 */
class Destroy extends Pipeline
{
    /**
     * This is the fill function, it initializes the pipeline
     *
     * @param $request
     * @param $category
     *
     * @return $this
     */
    public function fill($request, $category)
    {
        $passable = new PassableDestroy();
        $passable->setRequest($request);
        $passable->setModel($category);
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
                    Delete::class,
                    Format::class,
                ]
            )
            ->then(
                function (PassableDestroy $passable) {
                    return $passable->getResponse();
                }
            );
    }
}