<?php

namespace App\Http\Controllers;

use App\Models\Brewer;
use Illuminate\Http\Request;

class BrewersController extends Controller
{
    public function index() {
        $brewers = Brewer::all();
        return view('brewers', compact('brewers'));

    }

    public function details($id) {
        $brewer = Brewer::find($id);
        return view('brewer', compact('brewer'));
    }
}
