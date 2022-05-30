<?php

namespace App\Policies;

use App\Models\Law;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class LawPolicy
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
     * @param  \App\Models\Law  $law
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Law $law)
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
     * @param  \App\Models\Law  $law
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Law $law)
    {
        return Auth::check() && $law->user_id == Auth::id();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Law  $law
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Law $law)
    {
        return Auth::check() && $law->user_id == Auth::id();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Law  $law
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Law $law)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Law  $law
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Law $law)
    {
        //
    }
}
