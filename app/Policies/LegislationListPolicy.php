<?php

namespace App\Policies;

use App\Models\LegislationList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class LegislationListPolicy
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
     * @param  \App\Models\LegislationList  $legislationList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, LegislationList $legislationList)
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
     * @param  \App\Models\LegislationList  $legislationList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, LegislationList $legislationList)
    {
        return Auth::check() && $legislationList->user_id == Auth::id();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LegislationList  $legislationList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, LegislationList $legislationList)
    {
        return Auth::check() && $legislationList->user_id == Auth::id();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LegislationList  $legislationList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, LegislationList $legislationList)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LegislationList  $legislationList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, LegislationList $legislationList)
    {
        //
    }
}
