<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index() {
        $beers = Beer::all();
        return view('beers.index', compact('beers'));
    }

    public function show($id) {
        $beer = Beer::find($id);
        return view('beers.show', compact('beer'));
    }

    public function create() {
        return view('beers.create');
    }
}
