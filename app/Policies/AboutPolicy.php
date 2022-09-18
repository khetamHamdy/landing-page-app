<?php

namespace App\Policies;

use App\Models\About;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AboutPolicy
{
    use HandlesAuthorization;

    public function before(Admin $admin, $ability)
    {
        if ($admin->id == 1) {
            return true;
        }
    }

    /**
     * Determine whether the Admin can view any models.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $admin)
    {
        return $admin->hasAbility('aboutus.view');
    }

    /**
     * Determine whether the Admin can view the model.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\About $about
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, About $about)
    {
        return $admin->hasAbility('aboutus.view');
    }

    /**
     * Determine whether the Admin can create models.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $admin)
    {
        return $admin->hasAbility('aboutus.create');
    }

    /**
     * Determine whether the Admin can update the model.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\About $about
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, About $about)
    {
        return $admin->hasAbility('aboutus.update');
    }

    /**
     * Determine whether the Admin can delete the model.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\About $about
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, About $about)
    {
        return $admin->hasAbility('aboutus.delete');
    }

    /**
     * Determine whether the Admin can restore the model.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\About $about
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, About $about)
    {
        return $admin->hasAbility('aboutus.restore');
    }

    /**
     * Determine whether the Admin can permanently delete the model.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\About $about
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, About $about)
    {
        return $admin->hasAbility('aboutus.force-delete');
    }
}
