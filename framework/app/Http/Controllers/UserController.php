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
        $user = $id;
        $validated = $this->validate($request,
            [
                'name' => 'bail|required',
                'email' => 'bail|required|',
            ]);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->update();
        return back();
    }

    public function updateVerified(Request $request)
    {
        $user = \Auth::user();
        if(\Auth::user()->cannot('profile-verify', $user)) {
            return abort(404);
        }

        if(!$user->is_verified){
            $user->is_verified = 1;
            $user->save();
        }
        return back();


        /*Validate request here and save*/
    }


}
