<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index() {
        $beers = Beer::all();
        return view('beers', compact('beers'));

    }

    public function details($id) {
        $beer = Beer::find($id);
        return view('beer', compact('beer'));
    }
}
