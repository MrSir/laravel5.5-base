<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'deleted_at',
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

    /**
     * This function returns the User object that owns the site
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * This function returns a collection of Page objects that belong to this Site
     * @return HasMany
     */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
