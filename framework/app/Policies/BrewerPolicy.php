<?php

namespace App\Policies;

use App\Models\Brewer;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Client\Request;

class BrewerPolicy
{
    use HandlesAuthorization;

    public function before(User $user){
        if($user->is_admin){
            return Response::allow();
        }


    }


    public function viewAny(?User $user)
    {
        return Response::allow();
    }


    public function view(?User $user)
    {
        return Response::allow();
    }


    public function create(User $user)
    {
        return $user->brewer
            ? Response::allow()
            : Response::deny();
    }


    public function update(User $user, Brewer $brewer)
    {
       return $brewer->user_id === $user->id
           ? Response::allow()
           : Response::deny();
    }


    public function delete(User $user, Brewer $brewer)
    {
        return $brewer->user_id === $user->id
            ? Response::allow()
            : Response::deny();
    }


    public function restore(User $user)
    {
        return Response::denyAsNotFound();
    }


    public function forceDelete(User $user)
    {
        return Response::denyAsNotFound();
    }
}
