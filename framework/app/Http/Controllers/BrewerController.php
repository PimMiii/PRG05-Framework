<?php

namespace App\Http\Controllers;

use App\Models\Brewer;
use App\Models\User;
use Illuminate\Http\Request;

class BrewerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Brewer::class, 'brewer');
    }

    public function index()
    {
        $brewers = Brewer::latest()
            ->visible()
            ->paginate(5);
        return view('brewers.index', compact('brewers'));
    }


    public function create()
    {
        if (\Auth::user()->is_admin){
            $users = User::verified()
                ->orderBy('name')
                ->paginate(5);
            return view('brewers.create', compact('users'));
        }
        return view('brewers.create');
    }


    public function store(Request $request)
    {

        //validate request data
        $validated = $this->validate($request,
            [
                'name' => 'bail|required|unique:beers|max:255',
                'description' => 'nullable',
                'user_id'=> 'nullable|numeric|min:1|exists:users,id|',
            ]);
        if(!isset($validated['user_id'])){
            $validated['user_id'] = \Auth::id();
        }

        Brewer::create($validated);
        return redirect(route('brewers.index'));
    }


    public function show(Brewer $brewer)
    {
        return view('brewers.show', compact('brewer'));
    }


    public function edit(Brewer $brewer)
    {
        if (\Auth::user()->is_admin){
            $users = User::verified()->orderBy('name')->get();
            return view('brewers.edit', compact('brewer', 'users'));
        }
        return view('brewers.edit', compact('brewer'));
    }


    public function update(Request $request, Brewer $brewer)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:brewers',
                'name' => 'bail|required|max:255',
                'description' => 'nullable',
                'user_id'=> 'nullable|numeric|min:1|exists:users,id|'
            ]);
        $brewer->name = $validated['name'];
        $brewer->description = $validated['description'];
        if(array_key_exists('user_id', $validated)){
            $brewer->user_id = $validated['user_id'];
        }
        $brewer->save();
        return redirect(route('brewers.index'));
    }


    public function destroy(Request $request, Brewer $brewer)
    {
       $this->validate($request,
            [
                'id' => 'bail|required|exists:brewers'
            ]);
        $brewer->delete();
        return redirect(route('brewers.index'));
    }


    public function updateVisibility(Request $request, Brewer $brewer)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:brewers',
            ]);
        $this->toggleVisibility($brewer);

        return back();
    }

    private function toggleVisibility(Brewer $brewer){
        if(!$brewer->is_visible){
            $brewer->is_visible = 1;
        } else {
            $brewer->is_visible = 0;
        }
        return $brewer->save();
    }
}
