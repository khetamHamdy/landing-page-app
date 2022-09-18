<?php

namespace App\Policies;

use App\Models\Certificates;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class CertificatesPolicy
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
        return $admin->hasAbility('certificates.view');
    }

    /**
     * Determine whether the Admin can view the model.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\Certificates $certificates
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, Certificates $certificates)
    {
        return $admin->hasAbility('certificates.view');
    }

    /**
     * Determine whether the Admin can create models.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $admin)
    {
        return $admin->hasAbility('certificates.create');
    }

    /**
     * Determine whether the Admin can update the model.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\Certificates $certificates
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, Certificates $certificates)
    {
        return $admin->hasAbility('certificates.update');
    }

    /**
     * Determine whether the Admin can delete the model.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\Certificates $certificates
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, Certificates $certificates)
    {
        return $admin->hasAbility('certificates.delete');
    }

    /**
     * Determine whether the Admin can restore the model.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\Certificates $certificates
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, Certificates $certificates)
    {
        return $admin->hasAbility('certificates.restore');
    }

    /**
     * Determine whether the Admin can permanently delete the model.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\Certificates $certificates
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, Certificates $certificates)
    {
        return $admin->hasAbility('certificates.force-delete');
    }
}
