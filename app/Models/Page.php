<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Page
 * @package App\Models
 */
class Page extends Model
{
    /**
     * @var string
     */
    protected $table = 'pages';

    /**
     * @var array
     */
    protected $fillable = [
        'site_id',
        'order',
        'name',
        'url_slug',
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
        'site_id' => 'integer',
        'order' => 'integer',
        'name' => 'string',
        'url_slug' => 'string',
    ];
}
