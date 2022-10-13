<?php

namespace App\Http\Controllers;

use App\Models\Brewer;
use Illuminate\Http\Request;

class BrewerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Brewer::class, Brewer::class);
    }

    public function index()
    {
        $brewers = Brewer::all();
        return view('brewers.index', compact('brewers'));
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
        return redirect(route('brewers.index'));
    }


    public function show($id)
    {
        $brewer = Brewer::find($id);
        return view('brewers.show', compact('brewer'));
    }


    public function edit($id)
    {
        $brewer = Brewer::find($id);
        return view('brewers.edit', compact('brewer'));
    }

    public function update(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:categories',
                'name' => 'bail|required|unique:categories|max:255',
                'description' => 'nullable'
            ]);
        $category = Brewer::find($validated['id']);
        $category->name = $validated['name'];
        $category->description = $validated['description'];
        $category->save();
        return redirect(route('brewers.index'));
    }


    public function destroy(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:brewers'
            ]);
        Brewer::destroy($validated['id']);
        return redirect(route('brewers.index'));
    }


}
