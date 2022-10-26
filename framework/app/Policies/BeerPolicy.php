<?php

namespace App\Policies;

use App\Models\Beer;
use App\Models\Brewer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BeerPolicy
{
    use HandlesAuthorization;

    public function before(User $user){
        if($user->is_admin){
            Response::allow();
        }
    }


    public function viewAny(?User $user)
    {
        return Response::allow();
    }


    public function view(Beer $beer)
    {
        if(!$beer->is_visible){
            return Response::denyAsNotFound();
        }
        return Response::allow();
    }


    public function create(User $user)
    {
        $brewer = Brewer::where('user_id', '=', $user->id)->get();
        return $brewer->count() > 0
            ? Response::allow()
            : Response::deny();
    }


    public function update(User $user, Beer $beer)
    {
        return $beer->brewer->user_id === $user->id
            ? Response::allow()
            : Response::deny();
    }


    public function delete(User $user, Beer $beer)
    {
        return $beer->brewer->user_id === $user->id
            ? Response::allow()
            : Response::deny();
    }


    public function restore(User $user)
    {
        return Response::denyWithStatus(404);
    }


    public function forceDelete(User $user)
    {
        return Response::denyWithStatus(404);
    }

    public function toggleVisibility(User $user, Beer $beer)
    {
        return $beer->brewer->user_id === $user->id
            ? Response::allow()
            : Response::deny();
    }
}
