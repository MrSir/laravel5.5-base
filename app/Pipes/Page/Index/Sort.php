<?php

namespace App\Pipes\Page\Index;

use App\Exceptions\Page\Index\Sort as ExceptionSort;
use App\Pipes\Index\Sort as IndexSort;

/**
 * Class Sort
 * @package App\Pipes\Account\Index
 */
class Sort extends IndexSort
{
    /**
     * Paginate constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionSort::class);
    }
}