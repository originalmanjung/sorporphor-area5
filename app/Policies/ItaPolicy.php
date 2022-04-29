<?php

namespace App\Policies;

use App\Models\Ita;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItaPolicy
{
    use HandlesAuthorization;

    public function before (User $user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ita  $ita
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Ita $ita)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ita  $ita
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Ita $ita)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ita  $ita
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Ita $ita)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ita  $ita
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Ita $ita)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ita  $ita
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Ita $ita)
    {
        //
    }
}
