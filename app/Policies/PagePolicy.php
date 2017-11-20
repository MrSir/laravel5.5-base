<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Page;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the list of pages.
     *
     * @param  User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the page.
     *
     * @param  User  $user
     * @param  Page  $page
     * @return mixed
     */
    public function view(User $user, Page $page)
    {
        return true;
        //TODO implement
    }

    /**
     * Determine whether the user can create pages.
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
     * Determine whether the user can update the page.
     *
     * @param  User  $user
     * @param  Page  $page
     * @return mixed
     */
    public function update(User $user, Page $page)
    {
        return true;
        //TODO implement
    }

    /**
     * Determine whether the user can delete the page.
     *
     * @param  User  $user
     * @param  Page  $page
     * @return mixed
     */
    public function delete(User $user, Page $page)
    {
        return true;
        //TODO implement
    }
}
