<?php

namespace App\Pipes\Page\Index;

use App\Exceptions\Page\Index\Paginate as ExceptionPaginate;
use App\Pipes\Index\Paginate as IndexPaginate;

/**
 * Class Paginate
 * @package App\Pipes\Account\Index
 */
class Paginate extends IndexPaginate
{
    /**
     * Paginate constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionPaginate::class);
    }
}