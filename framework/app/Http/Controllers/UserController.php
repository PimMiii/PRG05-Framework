<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function show(User $id)
    {
        if(\Auth::user()->can('profile-view', $id)) {
            $profile = $id;
            return view('profile.show', compact('profile'));
        }
        return abort(404);
    }

    public function edit(User $id)
    {
        if(\Auth::user()->can('profile-view', $id)) {
            $profile = $id;
            return view('profile.edit', compact('profile'));
        }
        return abort(404);
    }


    public function update(Request $request, User $id)
    {
        if(\Auth::user()->cannot('profile-verify', $id)) {
            return abort(404);
        }

        /*Validate request here and save*/
    }

    public function verify(User $id)
    {
        if(\Auth::user()->can('profile-verify', $id)) {
            $profile = $id;
            return view('profile.verify', compact('profile'));
        }
        return abort(404);
    }

    public function updateVerified(Request $request, User $id)
    {
        if(\Auth::user()->cannot('profile-verify', $id)) {
            return abort(404);
        }

        /*Validate request here and save*/
    }


}
