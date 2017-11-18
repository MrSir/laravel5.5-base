<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Element
 * @package App\Models
 */
class Element extends Model
{
    /**
     * @var string
     */
    protected $table = 'elements';

    /**
     * @var array
     */
    protected $fillable = [
        'page_id',
        'order',
        'content',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'page_id' => 'integer',
        'order' => 'integer',
        'content' => 'string',
    ];
}
