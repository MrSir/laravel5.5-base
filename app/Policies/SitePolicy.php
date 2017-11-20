<?php

namespace App\Policies;

use App\Models\Site;
use App\Models\User;

class SitePolicy
{
    /**
     * Determine whether the user can view the list of sites.
     *
     * @param User $user
     *
     * @return mixed
     */
    public function index(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the site.
     *
     * @param User $user
     * @param Site $site
     *
     * @return mixed
     */
    public function view(User $user, Site $site)
    {
        if ($site->user_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create sites.
     *
     * @param User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the site.
     *
     * @param User $user
     * @param Site $site
     *
     * @return mixed
     */
    public function update(User $user, Site $site)
    {
        if ($site->user_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the site.
     *
     * @param User $user
     * @param Site $site
     *
     * @return mixed
     */
    public function delete(User $user, Site $site)
    {
        if ($site->user_id == $user->id) {
            return true;
        }

        return false;
    }
}
