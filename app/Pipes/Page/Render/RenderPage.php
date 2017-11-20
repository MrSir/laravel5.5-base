<?php

namespace App\Pipes\Page\Render;

use App\Exceptions\Page\Render\RenderPage as ExceptionRenderPage;
use App\Passables\Page\Render;
use App\Pipes\Pipe;
use Throwable;

/**
 * Class RenderPage
 * @package App\Pipes\Page\Render
 */
class RenderPage extends Pipe
{
    /**
     * RenderPage constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionRenderPage::class);
    }

    /**
     * @param Render $passable
     */
    public function buildQuery(Render &$passable)
    {
        try {
            $page = $passable->getModel();

            //TODO render the page
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }
    }
}