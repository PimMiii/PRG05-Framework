<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Review::class, 'review');
    }

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
        //percentage needs to be adjusted for database. [rating * 10]
        $data = $request->all();
        $data['rating'] *= 10;
        $data['user_id'] = \Auth::id();
        $request->merge($data);

        //validate request data
        $validated = $this->validate($request,
            [
                'rating' => 'bail|required|numeric|max:100|min:10',
                'comment' => 'nullable',
                'beer_id' => 'bail|required|numeric|exists:beers,id',
                'user_id' => 'bail|required|numeric|min:1|'
            ]);
        Review::create($validated);
        return redirect(route('beers.show', $request->all()['beer_id']));
    }



    public function show(Review $review)
    {
        return redirect(route('beers.show', $review->beer->id));
    }


    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }


    public function update(Request $request, Review $review)
    {
        $validated = $this->validate($request,
            [
                'rating' => 'bail|required|numeric|max:10|min:1',
                'comment' => 'nullable',
            ]);
        $review->rating = $validated['rating']*10;
        $review->comment = $validated['comment'];
        $review->save();
        return redirect(route('beers.show', $review->beer_id));
    }


    public function destroy(Request $request, Review $review)
    {

        $this->validate($request,
            [
                'id' => 'bail|required|exists:reviews'
            ]);
        $beer_id = $review->beer_id;
        $review->delete();
        return redirect(route('beers.show', $beer_id));
    }
}
