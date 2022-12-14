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
        if($user->is_admin){
            return Response::allow();
        }
    }


    public function viewAny(?User $user)
    {
        return Response::allow();
    }


    public function view(?User $user,Category $category)
    {
        if(!$category->is_visible){
            return Response::denyAsNotFound();
        }
        else {
            return Response::allow();
        }
    }


    public function create(User $user)
    {
        return isset($user->brewer)
            ? Response::allow()
            : Response::denyAsNotFound();
    }


    public function update(User $user)
    {
        return Response::denyAsNotFound();
    }


    public function delete(User $user)
    {
        return Response::denyAsNotFound();
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
