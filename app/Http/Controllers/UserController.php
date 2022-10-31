<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{

    public function view(User $profile)
    {
        $this->authorize('view', $profile);

            return view('profile.show', compact('profile'));

    }

    public function edit(User $profile)
    {
        $this->authorize('update', $profile);
            return view('profile.edit', compact('profile'));



    }


    public function update(Request $request, User $profile)
    {
        $this->authorize('update', $profile);
        $validated = $this->validate($request,
            [
                'name' => 'bail|required',
                'email' => 'bail|required|',
            ]);
        $profile->name = $validated['name'];
        $profile->email = $validated['email'];
        $profile->update();
        return redirect(route('profile.show', $profile->id));
    }

    public function updateVerified(Request $request, User $profile)
    {
        $this->authorize('update', $profile);

        if(!$profile->is_verified){
            $profile->is_verified = 1;
            $profile->save();
        }
        return back();
    }


}
