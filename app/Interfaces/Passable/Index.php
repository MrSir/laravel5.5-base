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
     *
     * @return mixed
     */
    public function setQuery($query);

    /**
     * @return mixed
     */
    public function getPerPage();

    /**
     * @param $perPage
     *
     * @return mixed
     */
    public function setPerPage($perPage);

    /**
     * @return mixed
     */
    public function getPage();

    /**
     * @param $page
     *
     * @return mixed
     */
    public function setPage($page);

    /**
     * @return mixed
     */
    public function getResults();

    /**
     * @param $results
     *
     * @return mixed
     */
    public function setResults($results);

    /**
     * @return mixed
     */
    public function getTotals();

    /**
     * @param $totals
     *
     * @return mixed
     */
    public function setTotals($totals);
}