<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Brewer;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->middleware('auth');*/

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $beers = Beer::latest()
            ->filter(\request(['search', 'searchCategory']))
            ->visible()
            ->orderByDesc('updated_at')
            ->paginate(5);
        $brewers = Brewer::orderBy('name')->visible()->get();
        $categories = Category::orderBy('name')->visible()->get();
        return view('home.index', compact('beers','brewers', 'categories'));
    }
}
