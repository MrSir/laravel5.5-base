<?php

namespace App\Pipes\Site\Index;

use App\Exceptions\Site\Index\Search as ExceptionSearch;
use App\Models\Site;
use App\Passables\Site\Index;
use App\Pipes\Index\Search as IndexSearch;
use Closure;
use Throwable;

/**
 * Class Search
 * @package App\Pipes\Site\Index
 */
class Search extends IndexSearch
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionSearch::class);
        $this->setModel(Site::class);
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
            if ($request->has('name')) {
                $query->where(
                    'name',
                    'LIKE',
                    '%' . $request->get('name') . '%'
                );
            }
            if ($request->has('description')) {
                $query->where(
                    'description',
                    'LIKE',
                    '%' . $request->get('description') . '%'
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