<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(){
        $categories = Category::find(1);
        $beers = $categories->beers;

        return view('categories', compact('categories', 'beers'));
    }

}
