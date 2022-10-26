<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user){
        if($user->is_admin){
            return Response::allow();
        }
        return Response::denyAsNotFound();
    }

    public function view(User $user, User $id)
    {
        if($user->id === $id->id){
            return Response::allow();
        } else {
            return Response::denyAsNotFound();
        }
    }

    public function update(User $user, User $id)
    {
        if($user->id === $id->id){
            return Response::allow();
        } else {
            return Response::denyAsNotFound();
        }
    }

    public function verify(User $user, User $id)
    {
       if(!$user->is_verified){
           if(!$id->is_verified){
               return Response::allow();
           }
       }
       return Response::denyWithStatus(402);
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
