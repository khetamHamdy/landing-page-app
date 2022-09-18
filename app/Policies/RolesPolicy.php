<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolesPolicy
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
        return $admin->hasAbility('roles.view');
    }

    /**
     * Determine whether the Admin can view the model.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\Roles $roles
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, Roles $roles)
    {
        return $admin->hasAbility('roles.view');

    }

    /**
     * Determine whether the Admin can create models.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $admin)
    {
        return $admin->hasAbility('roles.create');

    }

    /**
     * Determine whether the Admin can update the model.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\Roles $roles
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, Roles $roles)
    {
        return $admin->hasAbility('roles.update');

    }

    /**
     * Determine whether the Admin can delete the model.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\Roles $roles
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, Roles $roles)
    {
        return $admin->hasAbility('roles.delete');

    }

    /**
     * Determine whether the Admin can restore the model.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\Roles $roles
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, Roles $roles)
    {
        //
    }

    /**
     * Determine whether the Admin can permanently delete the model.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\Roles $roles
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, Roles $roles)
    {
        //
    }
}
