<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\Site;
use App\Models\User;

class PagePolicy
{
    /**
     * Determine whether the user can view the list of pages.
     *
     * @param User $user
     * @param int  $siteId
     *
     * @return mixed
     */
    public function index(User $user, int $siteId)
    {
        $site = Site::find($siteId);

        if ($site) {
            if ($site->user_id == $user->id) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can create pages.
     *
     * @param User $user
     * @param int  $siteId
     *
     * @return mixed
     */
    public function create(User $user, int $siteId)
    {
        $site = Site::find($siteId);

        if ($site) {
            if ($site->user_id == $user->id) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can update the page.
     *
     * @param User $user
     * @param Page $page
     *
     * @return mixed
     */
    public function update(User $user, Page $page)
    {
        $site = $page->site;

        if ($site) {
            if ($site->user_id == $user->id) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can delete the page.
     *
     * @param User $user
     * @param Page $page
     *
     * @return mixed
     */
    public function delete(User $user, Page $page)
    {
        $site = $page->site;

        if ($site) {
            if ($site->user_id == $user->id) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can render the page
     *
     * @return bool
     */
    public function render()
    {
        return true;
    }
}
