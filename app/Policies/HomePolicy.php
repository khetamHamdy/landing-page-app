<?php

namespace App\Policies;

use App\Models\Home;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class HomePolicy
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
     * @param  \App\Models\Admin  $Admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $Admin)
    {
        return $Admin->hasAbility('home.view');
    }

    /**
     * Determine whether the Admin can view the model.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $Admin, Home $home)
    {
        return $Admin->hasAbility('home.view');
    }

    /**
     * Determine whether the Admin can create models.
     *
     * @param  \App\Models\Admin  $Admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $Admin)
    {
        return $Admin->hasAbility('home.create');
    }

    /**
     * Determine whether the Admin can update the model.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $Admin, Home $home)
    {
        return $Admin->hasAbility('home.update');
    }

    /**
     * Determine whether the Admin can delete the model.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $Admin, Home $home)
    {
        return $Admin->hasAbility('home.delete');
    }

    /**
     * Determine whether the Admin can restore the model.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $Admin, Home $home)
    {
        //
    }

    /**
     * Determine whether the Admin can permanently delete the model.
     *
     * @param  \App\Models\Admin  $Admin
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $Admin, Home $home)
    {
        //
    }
}
