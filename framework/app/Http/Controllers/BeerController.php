<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
    public function store(Request $request){
        //percentage needs to be adjusted for database. [percentage * 100]
        $data = $request->all();
        $data['percentage'] *= 100;
        $request->merge($data);

        //validate request data
        $this->validate($request,
            [
                'name' => 'bail|required|unique:beers|max:255',
                'percentage' => 'bail|required|numeric|max:10000',
                'description' => 'nullable'
            ]);
        Beer::create($request->all());
        return redirect('/beers/');
    }
}
