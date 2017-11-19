<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Site
 * @package App\Models
 */
class Token extends Model
{
    /**
     * @var string
     */
    protected $table = 'tokens';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'type',
        'token',
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
        'type' => 'string',
        'token' => 'string',
    ];

    /**
     * This function returns the User object that owns the site
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
