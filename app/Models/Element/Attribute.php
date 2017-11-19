<?php

namespace App\Models\Element;

use App\Models\Element;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Attribute
 * @package App\Models\Element
 */
class Attribute extends Model
{
    /**
     * @var string
     */
    protected $table = 'element_attributes';

    /**
     * @var array
     */
    protected $fillable = [
        'element_id',
        'key',
        'value',
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
        'element_id' => 'integer',
        'key' => 'string',
        'value' => 'string',
    ];

    /**
     * This function returns the Element object this Attribute belongs to
     * @return BelongsTo
     */
    public function element()
    {
        return $this->belongsTo(Element::class);
    }
}
