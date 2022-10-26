<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index()
    {
        $categories = Category::visible()->orderBy('name')->get();
        return view('categories.index', compact('categories'));
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request)
    {
        //validate request data
        $this->validate($request,
            [
                'name' => 'bail|required|unique:categories|max:255',
                'description' => 'nullable'
            ]);
        Category::create($request->all());

        return redirect('/categories/');
    }


    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show', compact('category'));
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }


    public function update(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:categories',
                'name' => 'bail|required|exists:categories|max:255',
                'description' => 'nullable'
            ]);
        $category = Category::find($validated['id']);
        $category->name = $validated['name'];
        $category->description = $validated['description'];
        $category->save();
        return redirect('/categories');
    }


    public function destroy(Request $request)
    {
        $validated = $this->validate($request,
        [
            'id' => 'bail|required|exists:categories'
        ]);
        Category::destroy($validated['id']);
        return redirect('/categories');
    }

    public function updateVisibility(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:categories',
            ]);
        $this->toggleVisibility($validated['id']);

        return back();
    }

    private function toggleVisibility($id){
        $category = Category::find($id);
        if(!$category->is_visible){
            $category->is_visible = 1;
        } else {
            $category->is_visible = 0;
        }
        return $category->save();
    }
}
