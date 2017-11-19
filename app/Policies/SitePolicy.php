<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Site;
use Illuminate\Auth\Access\HandlesAuthorization;

class SitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the site.
     *
     * @param  User  $user
     * @param  Site  $site
     * @return mixed
     */
    public function view(User $user, Site $site)
    {
        return true;
        //TODO implement
    }

    /**
     * Determine whether the user can create sites.
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
     * Determine whether the user can update the site.
     *
     * @param  User  $user
     * @param  Site  $site
     * @return mixed
     */
    public function update(User $user, Site $site)
    {
        return true;
        //TODO implement
    }

    /**
     * Determine whether the user can delete the site.
     *
     * @param  User  $user
     * @param  Site  $site
     * @return mixed
     */
    public function delete(User $user, Site $site)
    {
        return true;
        //TODO implement
    }
}
