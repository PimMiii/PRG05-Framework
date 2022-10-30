<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{

    public function view(User $profile)
    {
        if(\Auth::user()->can('profile-view', $profile)) {
            return view('profile.show', compact('profile'));
        }
        return abort(404);
    }

    public function edit(User $profile)
    {
        if(\Auth::user()->can('profile-edit', $profile)) {
            return view('profile.edit', compact('profile'));
        }
        return abort(404);
    }


    public function update(Request $request, User $user)
    {
        if(\Auth::user()->cannot('profile-edit', $user)) {
            return abort(404);
        }
        $validated = $this->validate($request,
            [
                'name' => 'bail|required',
                'email' => 'bail|required|',
            ]);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->update();
        return redirect(route('profile.show', $user->id));
    }

    public function updateVerified(Request $request, User $user)
    {
        if(\Auth::user()->cannot('profile-verify', $user)) {
            return abort(404);
        }

        if(!$user->is_verified){
            $user->is_verified = 1;
            $user->save();
        }
        return back();
    }


}
