<?php

namespace App\Pipes\Site\Update;

use App\Exceptions\Site\Update\Translate as ExceptionTranslate;
use App\Models\Site;
use App\Passables\Site\Update;
use App\Pipes\Update\Translate as UpdateTranslate;
use Closure;
use Throwable;

/**
 * Class Translate
 * @package App\Pipes\Site\Update
 */
class Translate extends UpdateTranslate
{
    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct(ExceptionTranslate::class);
        $this->setModel(Site::class);
    }

    /**
     * @param Update   $passable
     * @param Closure $next
     *
     * @return mixed
     * @throws ExceptionTranslate
     */
    public function handle(Update &$passable, Closure $next)
    {
        try {
            $this->translateRequest($passable);
        } catch (Throwable $e) {
            $exceptionType = $this->getExceptionType();
            throw new $exceptionType($e);
        }

        return $next($passable);
    }
}