<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function show(int $id)
    {
        if (!Gate::allows('profile-view', [\Auth::user(), $id])) {
            abort(404);
        }
            $profile = User::find($id);
            return view('profile.show', compact('profile'));

    }

    public function edit(int $id)
    { if (!Gate::allows('profile-edit', [\Auth::user(), $id])) {
        abort(404);
    }
        $profile = User::find($id);
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        abort(404);
    }


    public function verify(int $id)
    {
        abort(404);
    }

    public function updateVerified(Request $request)
    {
        abort(404);
    }


}
