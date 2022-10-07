<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show($id){
        $category = Category::find($id);
        return view('categories.show', compact('category'));
    }
    public function create() {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        //validate request data
        $this->validate($request,
            [
                'name' => 'bail|required|unique:beers|max:255',
                'description' => 'nullable'
            ]);
        Category::create($request->all());
        return redirect('/categories/');
    }
}
