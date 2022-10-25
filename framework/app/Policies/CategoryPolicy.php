<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function before(User $user){
        return $user->is_admin
            ? Response::allow()
            : Response::deny();
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
        return Response::denyWithStatus(404);
    }


    public function update(User $user)
    {
        return Response::denyWithStatus(404);
    }


    public function delete(User $user)
    {
        return Response::denyWithStatus(404);
    }


    public function restore(User $user)
    {
        return Response::denyWithStatus(404);
    }


    public function forceDelete(User $user)
    {
        return Response::denyWithStatus(404);
    }
}
