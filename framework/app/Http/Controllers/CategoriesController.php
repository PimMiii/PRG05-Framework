<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('categories', compact('categories'));
    }

    public function details($id){
        $category = Category::find($id);
        return view('category', compact('category'));
    }
}
