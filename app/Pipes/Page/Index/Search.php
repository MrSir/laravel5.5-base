<?php

namespace App\Pipes\Page\Index;

use App\Exceptions\Page\Index\Search as ExceptionSearch;
use App\Models\Page;
use App\Passables\Page\Index;
use App\Pipes\Index\Search as IndexSearch;
use Closure;
use Throwable;

/**
 * Class Search
 * @package App\Pipes\Page\Index
 */
class Search extends IndexSearch
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionSearch::class);
        $this->setModel(Page::class);
    }

    /**
     * @param Index   $passable
     * @param Closure $next
     *
     * @return mixed
     * @throws ExceptionSearch
     */
    public function handle(Index &$passable, Closure $next)
    {
        try {
            $this->buildQuery($passable);
            $query = $passable->getQuery();
            $request = $passable->getRequest();

            if ($request->has('siteId')) {
                $query->where(
                    'site_id',
                    '=',
                    $request->get('siteId')
                );
            }

            $passable->setQuery($query);
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}