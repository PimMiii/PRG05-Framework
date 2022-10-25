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
        } else {
            $profile = User::find($id);
            return view('profile.show', compact('profile'));

        }
    }
}
