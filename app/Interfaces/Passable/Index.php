<?php

namespace App\Interfaces\Passable;

/**
 * Interface Index
 * @package App\Interfaces\Passable
 */
interface Index extends Base
{
    /**
     * @return mixed
     */
    public function getQuery();

    /**
     * @param $query
     */
    public function setQuery($query);

    /**
     * @return mixed
     */
    public function getPerPage();

    /**
     * @param $perPage
     */
    public function setPerPage($perPage);

    /**
     * @return mixed
     */
    public function getPage();

    /**
     * @param $page
     */
    public function setPage($page);

    /**
     * @return mixed
     */
    public function getResults();

    /**
     * @param $results
     */
    public function setResults($results);

    /**
     * @return mixed
     */
    public function getTotals();

    /**
     * @param $totals
     */
    public function setTotals($totals);
}