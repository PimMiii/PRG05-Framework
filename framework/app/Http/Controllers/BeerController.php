<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BeerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Beer::class, Beer::class);
    }


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
        return redirect(route('beers.index'));
    }


    public function edit($id)
    {
        $beer = Beer::find($id);
        return view('beers.edit', compact('beer'));
    }


    public function update(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:beers',
                'name' => 'bail|required|max:255',
                'percentage' => 'bail|required|numeric|max:10000',
                'description' => 'nullable'
            ]);
        $beer = Beer::find($validated['id']);
        $beer->name = $validated['name'];
        $beer->percentage = $validated['percentage']*100;
        $beer->description = $validated['description'];
        $beer->save();
        return redirect(route('beers.show', $beer->id));
    }


    public function destroy(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:beers'
            ]);
        Beer::destroy($validated['id']);
        return redirect(route('beers.index'));
    }
}
