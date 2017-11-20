<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class User
 * @package App\Models
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'registered_at',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'registered_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * This function returns a collection of Token objects that belong to the User
     * @return HasMany
     */
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    /**
     * This function returns a collection of Site objects that belong to the User
     * @return HasMany
     */
    public function sites()
    {
        return $this->hasMany(Site::class);
    }
}
