<?php

namespace App\Policies;

use App\Models\Features;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeaturesPolicy
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
        return $Admin->hasAbility('features.view');
    }

    /**
     * Determine whether the Admin can view the model.
     *
     * @param \App\Models\Admin $Admin
     * @param \App\Models\Features $features
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $Admin, Features $features)
    {
        return $Admin->hasAbility('features.view');
    }

    /**
     * Determine whether the Admin can create models.
     *
     * @param \App\Models\Admin $Admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $Admin)
    {
        return $Admin->hasAbility('features.create');
    }

    /**
     * Determine whether the Admin can update the model.
     *
     * @param \App\Models\Admin $Admin
     * @param \App\Models\Features $features
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $Admin, Features $features)
    {
        return $Admin->hasAbility('features.update');
    }

    /**
     * Determine whether the Admin can delete the model.
     *
     * @param \App\Models\Admin $Admin
     * @param \App\Models\Features $features
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $Admin, Features $features)
    {
        return $Admin->hasAbility('features.delete');
    }

    /**
     * Determine whether the Admin can restore the model.
     *
     * @param \App\Models\Admin $Admin
     * @param \App\Models\Features $features
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $Admin, Features $features)
    {
        return $Admin->hasAbility('features.restore');
    }

    /**
     * Determine whether the Admin can permanently delete the model.
     *
     * @param \App\Models\Admin $Admin
     * @param \App\Models\Features $features
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $Admin, Features $features)
    {
        return $Admin->hasAbility('features.force-delete');
    }
}
