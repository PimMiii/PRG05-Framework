<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReviewPolicy
{
    use HandlesAuthorization;

    public function before(User $user){
        if($user->is_admin === 1){
            return Response::allow();
        }
    }


    public function viewAny(?User $user)
    {
        return Response::denyAsNotFound();
    }


    public function view(?User $user)
    {
        return Response::allow();
    }


    public function create(User $user)
    {
        if($user->is_verified === 1){
            return Response::allow();
        } else {
            return Response::deny();
        }
    }


    public function update(User $user, int $id)
    {
        $review = Review::find($id);
        if($review->user_id === $user->id){
            return Response::allow();
        } else {
            return Response::deny();
        }
    }


    public function delete(User $user, int $id)
    {
        $review = Review::find($id);
        if($review->user_id === $user->id){
            return Response::allow();
        } else {
            return Response::deny();
        }
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