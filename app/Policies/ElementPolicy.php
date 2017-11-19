<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Element;
use Illuminate\Auth\Access\HandlesAuthorization;

class ElementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the element.
     *
     * @param  User  $user
     * @param  Element  $element
     * @return mixed
     */
    public function view(User $user, Element $element)
    {
        return true;
        //TODO implement
    }

    /**
     * Determine whether the user can create elements.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
        //TODO implement
    }

    /**
     * Determine whether the user can update the element.
     *
     * @param  User  $user
     * @param  Element  $element
     * @return mixed
     */
    public function update(User $user, Element $element)
    {
        return true;
        //TODO implement
    }

    /**
     * Determine whether the user can delete the element.
     *
     * @param  User  $user
     * @param  Element  $element
     * @return mixed
     */
    public function delete(User $user, Element $element)
    {
        return true;
        //TODO implement
    }
}
