<?php

namespace App\Http\Controllers;

use App\Models\Brewer;
use Illuminate\Http\Request;

class BrewersController extends Controller
{
    public function index() {
        $brewers = Brewer::all();
        return view('brewers.index', compact('brewers'));

    }

    public function show($id) {
        $brewer = Brewer::find($id);
        return view('brewers.show', compact('brewer'));
    }
}
