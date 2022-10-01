<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(){
        $categories = Category::all();

        return view('categories', compact('categories'));
    }
}
