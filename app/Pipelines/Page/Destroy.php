<?php

namespace App\Pipelines\Page;

use App\Passables\Page\Destroy as PassableDestroy;
use App\Pipelines\Pipeline;
use App\Pipes\Page\Destroy\Delete;
use App\Pipes\Page\Destroy\Format;

/**
 * Class Destroy
 * @package App\Pipelines\Page
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