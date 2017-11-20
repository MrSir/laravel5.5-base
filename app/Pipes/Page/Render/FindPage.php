<?php

namespace App\Pipes\Page\Render;

use App\Exceptions\Page\Render\FindPage as ExceptionFindPage;
use App\Models\Site;
use App\Passables\Page\Render;
use App\Pipes\Pipe;
use Closure;
use Throwable;

/**
 * Class FindPage
 * @package App\Pipes\Page\Render
 */
class FindPage extends Pipe
{
    /**
     * RenderPage constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionFindPage::class);
    }

    /**
     * @param Render  $passable
     * @param Closure $next
     *
     * @return mixed
     * @throws ExceptionFindPage
     */
    public function handle(Render &$passable, Closure $next)
    {
        try {
            $request = $passable->getRequest();
            $url = $request->get('url');

            $parsedURL = parse_url($url);

            $site = Site::whereUrl($parsedURL['host'])
                ->first();

            $page = $site->pages()
                ->where(
                    'url_slug',
                    '=',
                    substr(
                        $parsedURL['path'],
                        1
                    )
                )
                ->first();

            $passable->setModel($page);
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}