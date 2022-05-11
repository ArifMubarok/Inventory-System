<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\DataMerk;
use App\Models\User;

class DataMerkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DataMerk  $dataMerk
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, DataMerk $dataMerk)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DataMerk  $dataMerk
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, DataMerk $dataMerk)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DataMerk  $dataMerk
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, DataMerk $dataMerk)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DataMerk  $dataMerk
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, DataMerk $dataMerk)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DataMerk  $dataMerk
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, DataMerk $dataMerk)
    {
        //
    }
}
