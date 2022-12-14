<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Brewer;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BeerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Beer::class, 'beer');
    }

    public function index() {
        $categories = Category::visible()->get();
        $beers = Beer::latest()
            ->filter(\request(['search', 'searchCategory']))
            ->visible()
            ->orderByDesc('updated_at')
            ->paginate(5);

        return view('beers.index', compact('beers', 'categories'));
    }


    public function show(Beer $beer) {
        $userReview = null;
        foreach ($beer->reviews as $review){
            if (\Auth::id() === $review->user_id){
                $userReview = $review;
            }
        }
        return view('beers.show', compact('beer', 'userReview'));
    }


    public function create() {
        if(\Auth::user()->is_admin===1){
            $brewers = Brewer::all();
        }else {
            $brewers = Brewer::where('user_id', '=', \Auth::id())->get();
        }
        $categories = Category::all();
        return view('beers.create', compact('brewers', 'categories'));
    }


    public function store(Request $request){
        //percentage needs to be adjusted for database. [percentage * 100]
        $data = $request->all();
        $data['percentage'] *= 100;
        $request->merge($data);

        //validate request data
        $validated = $this->validate($request,
            [
                'name' => 'bail|required|unique:beers|max:255',
                'percentage' => 'bail|required|numeric|max:10000',
                'description' => 'nullable',
                'brewer_id' =>'bail|required|numeric|min:1|exists:brewers,id',
                'category_id' => 'bail|required',
                'category_id.*' => 'bail|numeric|min:1|exists:categories,id'
            ]);

        $beer = Beer::create($validated);
        $beer->categories()->attach($validated['category_id']);
        return redirect(route('beers.index'));
    }


    public function edit(Beer $beer)
    {
        if(\Auth::user()->is_admin===1){
            $brewers = Brewer::all();
        }else {
            $brewers = Brewer::where('user_id', '=', \Auth::id())->get();
        }
        $categories = Category::all();
        $selectedCategories = $beer->categories;
        return view('beers.edit', compact('beer', 'brewers', 'categories', 'selectedCategories'));
    }


    public function update(Request $request, Beer $beer)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:beers',
                'name' => 'bail|required|max:255',
                'percentage' => 'bail|required|numeric|max:10000',
                'description' => 'nullable',
                'brewer_id'=> 'bail|required|numeric|min:1|exists:brewers,id',
                'category_id' => 'bail|required',
                'category_id.*' => 'bail|numeric|min:1|exists:categories,id'
            ]);
        $beer->name = $validated['name'];
        $beer->percentage = $validated['percentage']*100;
        $beer->description = $validated['description'];
        $beer->brewer_id = $validated['brewer_id'];
        $beer->save();
        $beer->categories()->sync($validated['category_id']);
        return redirect(route('beers.show', $beer->id));
    }


    public function destroy(Request $request, Beer $beer)
    {
        $this->validate($request,
            [
                'id' => 'bail|required|exists:beers'
            ]);
        $beer->delete();
        return redirect(route('beers.index'));
    }

    public function updateVisibility(Request $request, Beer $beer)
    {
        $this->validate($request,
            [
                'id' => 'bail|required|exists:beers',
            ]);
        $this->toggleVisibility($beer);

        return redirect()->back();
    }

    private function toggleVisibility(Beer $beer){
        if(!$beer->is_visible){
            $beer->is_visible = 1;
        } else {
            $beer->is_visible = 0;
        }
        return $beer->save();
    }
}
