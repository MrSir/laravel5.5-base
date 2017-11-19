<?php

namespace App\Models;

use App\Models\Element\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'deleted_at',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'page_id' => 'integer',
        'order' => 'integer',
        'content' => 'string',
    ];

    /**
     * This function returns the Page object that this Element belongs to
     * @return BelongsTo
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * This function returns a collection of Attribute object that belong to this Element
     * @return HasMany
     */
    public function elementAttributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
