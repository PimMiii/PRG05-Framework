<?php

namespace App\Policies;

use App\Models\Beer;
use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Request;
use Ramsey\Uuid\Type\Integer;

class ReviewPolicy
{
    use HandlesAuthorization;

    public function before(User $user){
        return $user->is_admin
            ? Response::allow()
            : Response::deny();
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
        return $user->is_verified === 1
                ? Response::allow()
                : Response::deny();
    }


    public function update(User $user, Review $review)
    {
        return $review->user_id === $user->id
            ? Response::allow()
            : Response::deny();
    }


    public function delete(User $user, Review $review)
    {
        return $review->user_id === $user->id
            ? Response::allow()
            : Response::deny();
    }



    public function restore(User $user)
    {
        return Response::denyWithStatus(404);
    }


    public function forceDelete(User $user, Review $review)
    {
        return Response::denyWithStatus(404);
    }
}
