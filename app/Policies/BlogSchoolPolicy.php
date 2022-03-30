<?php

namespace App\Policies;

use App\Models\BlogSchool;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogSchoolPolicy
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
     * @param  \App\Models\BlogSchool  $blogSchool
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, BlogSchool $blogSchool)
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
     * @param  \App\Models\BlogSchool  $blogSchool
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, BlogSchool $blogSchool)
    {
        return Auth::check() && $blogSchool->user_id == Auth::id();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogSchool  $blogSchool
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, BlogSchool $blogSchool)
    {
        return Auth::check() && $blogSchool->user_id == Auth::id();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogSchool  $blogSchool
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, BlogSchool $blogSchool)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogSchool  $blogSchool
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, BlogSchool $blogSchool)
    {
        //
    }
}
