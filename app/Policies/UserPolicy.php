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
    }

    public function view(User $user, User $profile)
    {
        if($user->id === $profile->id){
            return Response::allow();
        } else {
            return Response::denyAsNotFound();
        }
    }

    public function update(User $user, User $profile)
    {
        if($user->id === $profile->id){
            return Response::allow();
        } else {
            return Response::denyAsNotFound();
        }
    }

    public function verify(User $user, User $profile)
    {
        if($user->id === $profile->id){
            return Response::allow();
        } else {
            return Response::denyAsNotFound();
        }
    }


}
