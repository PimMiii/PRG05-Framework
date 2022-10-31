<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Brewer;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index() {
        if (! Gate::allows('admin-view', \Auth::user())) {
            abort(404);
        } else {
            $beers = Beer::orderBy('name')->get();
            $brewers = Brewer::orderBy('name')->get();
            $categories = Category::orderBy('name')->get();
            $users = User::orderBy('name')->get();
            return view('admin.index', compact('beers', 'brewers', 'categories', 'users'));
        }
    }
}
