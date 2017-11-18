<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Site
 * @package App\Models
 */
class Site extends Model
{
    /**
     * @var string
     */
    protected $table = 'sites';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'is_published',
        'title',
        'url',
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
        'user_id' => 'integer',
        'is_published' => 'boolean',
        'title' => 'string',
        'url' => 'string',
    ];
}
