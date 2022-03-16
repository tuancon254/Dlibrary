<?php

namespace App\Policies;

use App\Models\Documents;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
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
        return $user->checkPermission('documents-list');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return $user->checkPermission('documents-show');
    }

    /**
     * Determine whether the user can read the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function read(User $user, Documents $documents)
    {
        if(!is_null($documents->semester->sem_id)){
            return $user->DocumentAccess($documents->semester->sem_id);
        }
        return true;
        // return $user->DocumentAccess(1);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->checkPermission('documents-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return $user->checkPermission('documents-edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->checkPermission('documents-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Documents $documents)
    {

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Documents $documents)
    {
        //
    }

    public function download(User $user)
    {
        return $user->checkPermission('documents-dowload');
    }

    public function search(User $user)
    {
        return $user->checkPermission('documents-search');
    }


    public function censor(User $user)
    {
        return $user->checkPermission('documents-censor');
    }
}
