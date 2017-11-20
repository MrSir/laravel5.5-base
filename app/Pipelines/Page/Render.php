<?php

namespace App\Pipelines\Page;

use App\Passables\Page\Render as PassableRender;
use App\Pipelines\Pipeline;
use App\Pipes\Page\Render\FindPage;
use App\Pipes\Page\Render\RenderPage;

/**
 * Class Render
 * @package App\Pipelines\Page
 */
class Render extends Pipeline
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
        $passable = new PassableRender();
        $passable->setRequest($request);
        $this->setPassable($passable);

        return $this;
    }

    /**
     * This is the flush function, it executes the entire pipe
     * @return PassableRender
     */
    public function flush()
    {
        return $this->send($this->getPassable())
            ->through(
                [
                    FindPage::class,
                    RenderPage::class,
                ]
            )
            ->then(
                function (PassableRender $passable) {
                    return $passable->getResponse();
                }
            );
    }
}