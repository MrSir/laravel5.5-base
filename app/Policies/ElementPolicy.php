<?php

namespace App\Policies;

use App\Models\Element;
use App\Models\Page;
use App\Models\User;

class ElementPolicy
{
    /**
     * Determine whether the user can create elements.
     *
     * @param User $user
     * @param int  $pageId
     *
     * @return mixed
     */
    public function create(User $user, int $pageId)
    {
        $page = Page::find($pageId);

        if ($page) {
            if ($page->site->user_id == $user->id) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can update the element.
     *
     * @param User    $user
     * @param Element $element
     *
     * @return mixed
     */
    public function update(User $user, Element $element)
    {
        $page = $element->page;

        if ($page) {
            if ($page->site->user_id == $user->id) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can delete the element.
     *
     * @param User    $user
     * @param Element $element
     *
     * @return mixed
     */
    public function delete(User $user, Element $element)
    {
        $page = $element->page;

        if ($page) {
            if ($page->site->user_id == $user->id) {
                return true;
            }
        }

        return false;
    }
}
