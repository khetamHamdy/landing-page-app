<?php

namespace App\Policies;

use App\Models\Services;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicesPolicy
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
     * @param \App\Models\Admin $Admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $Admin)
    {
        return $Admin->hasAbility('services.view');
    }

    /**
     * Determine whether the Admin can view the model.
     *
     * @param \App\Models\Admin $Admin
     * @param \App\Models\Services $services
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $Admin, Services $services)
    {
        return $Admin->hasAbility('services.view');
    }

    /**
     * Determine whether the Admin can create models.
     *
     * @param \App\Models\Admin $Admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $Admin)
    {
        return $Admin->hasAbility('services.create');
    }

    /**
     * Determine whether the Admin can update the model.
     *
     * @param \App\Models\Admin $Admin
     * @param \App\Models\Services $services
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $Admin, Services $services)
    {
        return $Admin->hasAbility('services.update');
    }

    /**
     * Determine whether the Admin can delete the model.
     *
     * @param \App\Models\Admin $Admin
     * @param \App\Models\Services $services
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $Admin, Services $services)
    {
        return $Admin->hasAbility('services.delete');
    }

    /**
     * Determine whether the Admin can restore the model.
     *
     * @param \App\Models\Admin $Admin
     * @param \App\Models\Services $services
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $Admin, Services $services)
    {
        //
    }

    /**
     * Determine whether the Admin can permanently delete the model.
     *
     * @param \App\Models\Admin $Admin
     * @param \App\Models\Services $services
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $Admin, Services $services)
    {
        //
    }
}
