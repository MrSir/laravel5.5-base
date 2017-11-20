<?php

namespace App\Pipes\Page\Render;

use App\Exceptions\Page\Render\RenderPage as ExceptionRenderPage;
use App\Passables\Page\Render;
use App\Pipes\Pipe;
use Closure;
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
     * @param Closure $next
     *
     * @return mixed
     * @throws ExceptionRenderPage
     */
    public function handle(Render &$passable, Closure $next)
    {
        try {
            $response = [
                'code' => 404,
                'view' => view('404')
            ];

            if ($passable->isPublished()) {
                $page = $passable->getModel();
                $site = $page->site;

                $data = [
                    'site' => $site,
                    'page' => $page,
                ];

                $response = [
                    'code' => 200,
                    'view' => view(
                        'page',
                        $data
                    )
                ];
            }

            $passable->setResponse($response);
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}
