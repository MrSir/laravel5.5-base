<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can create sites.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create()
    {
        return true;
    }
}
