<?php

namespace App\Policies;

use App\Models\Intergrity;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class IntergrityPolicy
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
     * @param  \App\Models\Intergrity  $intergrity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Intergrity $intergrity)
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
     * @param  \App\Models\Intergrity  $intergrity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Intergrity $intergrity)
    {
        return Auth::check() && $intergrity->user_id == Auth::id();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Intergrity  $intergrity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Intergrity $intergrity)
    {
        return Auth::check() && $intergrity->user_id == Auth::id();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Intergrity  $intergrity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Intergrity $intergrity)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Intergrity  $intergrity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Intergrity $intergrity)
    {
        //
    }
}
