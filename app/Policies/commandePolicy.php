<?php

namespace App\Policies;

use App\User;
use App\commande;
use Illuminate\Auth\Access\HandlesAuthorization;

class commandePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any commandes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the commande.
     *
     * @param  \App\User  $user
     * @param  \App\commande  $commande
     * @return mixed
     */
    public function view(User $user, commande $commande)
    {
      return ($commande->client_id == $user->id) ? true : false;
    }

    /**
     * Determine whether the user can create commandes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the commande.
     *
     * @param  \App\User  $user
     * @param  \App\commande  $commande
     * @return mixed
     */
    public function update(User $user, commande $commande)
    {
        //
    }

    /**
     * Determine whether the user can delete the commande.
     *
     * @param  \App\User  $user
     * @param  \App\commande  $commande
     * @return mixed
     */
    public function delete(User $user, commande $commande)
    {
        //
    }

    /**
     * Determine whether the user can restore the commande.
     *
     * @param  \App\User  $user
     * @param  \App\commande  $commande
     * @return mixed
     */
    public function restore(User $user, commande $commande)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the commande.
     *
     * @param  \App\User  $user
     * @param  \App\commande  $commande
     * @return mixed
     */
    public function forceDelete(User $user, commande $commande)
    {
        //
    }
}
