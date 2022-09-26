<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $currentTime = Date('H:i:s');
        return view('home', compact('currentTime'));
    }
}
