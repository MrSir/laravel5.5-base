<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'deleted_at',
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

    /**
     * This function returns the Site object this Page belongs to
     * @return BelongsTo
     */
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    /**
     * This function returns a collection of Element objects that belong to this Page
     * @return HasMany
     */
    public function elements()
    {
        return $this->hasMany(Element::class);
    }
}
