<?php

namespace App\Http\Controllers;

use App\Models\Brewer;
use Illuminate\Http\Request;

class BrewersController extends Controller
{
    public function index()
    {
        $brewers = Brewer::all();
        return view('brewers.index', compact('brewers'));

    }

    public function show($id)
    {
        $brewer = Brewer::find($id);
        return view('brewers.show', compact('brewer'));
    }

    public function create()
    {
        return view('brewers.create');
    }

    public function store(Request $request)
    {
        //validate request data
        $this->validate($request,
            [
                'name' => 'bail|required|unique:beers|max:255',
                'description' => 'nullable'
            ]);
        Brewer::create($request->all());
        return redirect('/brewers/');
    }
}
