<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
        return redirect(route('beers.index'));
    }


    public function create()
    {
        return redirect(route('beers.index'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show(int $id)
    {
        $review = Review::find($id);
        return redirect(route('beers.show', $review->beer->id));
    }


    public function edit(int $id)
    {
        //
    }


    public function update(Request $request)
    {
        //
    }


    public function destroy(Request $request)
    {
        //
    }
}
