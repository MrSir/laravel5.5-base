<?php

namespace App\Passables\Page;

use App\Passables\Base;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Render
 * @package App\Passables\Page
 */
class Render extends Base
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var bool
     */
    protected $isPublished;

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param Model $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->isPublished;
    }

    /**
     * @param bool $isPublished
     */
    public function setIsPublished(bool $isPublished)
    {
        $this->isPublished = $isPublished;
    }
}
